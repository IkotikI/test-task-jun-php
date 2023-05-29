<?php
/**
 * 
 */
#[AllowDynamicProperties]
class Post
{

	/**
	 * Post ID
	 * @var int
	 */
	public $ID;

	/**
	 * Author ID
	 * @var int
	 */
	public $post_author;
	
	/**
	 * Post local publication time
	 * @var string
	 */
	public $post_date = '0000-00-00 00:00:00';
	
	/**
	 * Post GMT publication time
	 * @var string
	 */
	public $post_date_gmt = '0000-00-00 00:00:00';
	
	/**
	 * Post content
	 * @var string
	 */
	public $post_content = '';
	
	/**
	 * Post title
	 * @var string
	 */
	public $post_title = '';
	
	/**
	 * Post status
	 * @var string
	 */
	public $post_status = 'publish';
	
	/**
	 * Comment status
	 * @var string
	 */
	public $comment_status = 'open';
	
	/**
	 * Post slug
	 * @var string
	 */
	public $post_name = '';
	
	/**
	 * Post local last modification time
	 * @var string
	 */
	public $post_modified = '0000-00-00 00:00:00';
	
	/**
	 * Post GMT last modification time
	 * @var string
	 */
	public $post_modified_gmt = '0000-00-00 00:00:00';
	
	/**
	 * Parent Post ID
	 * @var int
	 */
	public $post_parent = 0;
	
	/**
	 * Unique indetifer for the post. URL structure.
	 * @var string
	 */
	public $guid = '';
	
	/**
	 * Type of the post
	 * @var string
	 */
	public $post_type = 'post';

	public static function get_instance( $post_id ) {
		global $wpdb;

		$post_id = (int) $post_id;
		if ( ! $post_id ) {
			return false;
		}

		$_post = $wpdb->get_results("SELECT * FROM `posts` WHERE `ID` = '{$post_id}' LIMIT 1", ARRAY_A);

		return $_post;
	}
	
	public function __construct( $post ) {
		foreach ( get_object_vars( $post ) as $key => $value ) {
			$this->$key = $value;
		}
	}

	public function __set( $name, $value ) {
		$this->$name = $value;
	}

	public function __get( $name ) {
		if ( isset($this->name) ) {
			return $this->$name;
		}
	}

}