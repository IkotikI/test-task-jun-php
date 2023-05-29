<?php
/**
 * 
 */
#[AllowDynamicProperties]
class Post_Query
{

	/**
	 * Query vars
	 * @var [type]
	 */
	public $query;
	
	/**
	 * SQL
	 * @var string
	 */
	public $request;

	public $posts;
	
	public function __construct( $query = '' ) {
		if ( ! empty( $query ) ) {
			$this->query( $query );
		}
	}

	public function query( $query ) {

		$this->query = $query;
		$this->get_posts();
	}

	public function get_posts() {
		global $db;

		$post_status = $this->query['post_status'] ?? 'publish';
		$post_status = "`post_status` = '{$post_status}'";

		$post_type = $this->query['post_type'] ?? 'post';
		$post_type = "`post_type` = '{$post_type}'";

		$limit = ( isset($this->query['post_limit'] ) && is_int() )
			 ? 'LIMIT ' . (int) isset($this->query['post_limit'])
			 : '';

		$sql = "SELECT * FROM `posts` WHERE {$post_type} AND {$post_status} {$limit}";

		$results = $db->get_results($sql, ARRAY_A);

		$posts = array();
		if ( ! empty( $results ) ) {
			foreach ($results as $res) {
				$posts[] = new Post($res);
			}
		}

		return $posts;
	}
}