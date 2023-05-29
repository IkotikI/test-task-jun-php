<?php
/**
 * 
 */
class DB
{
	/**
	 * Database table column charset
	 * @var string
	 */
	public $charset;

	/**
	 * Database username
	 * @var string
	 */
	protected $dbuser;

	/**
	 * Database password
	 * @var string
	 */
	protected $dbpassword;

	/**
	 * Database name
	 * @var string
	 */
	protected $dbname;

	/**
	 * Database hostname
	 * @var string
	 */
	protected $dbhost;

	/**
	 * Database handler
	 * @var mysqli
	 */
	protected $dbh;
	
	function __construct( $dbuser, $dbpassword, $dbname, $dbhost )
	{

		$this->dbuser = $dbuser;

		$this->dbpassword = $dbpassword;

		$this->dbname = $dbname;

		$this->dbhost = $dbhost;

		$this->db_connect();
		
	}

	public function db_connect() {

		$this->dbh = new mysqli($this->dbhost, $this->dbuser, $this->dbpassword, $this->dbname);

		if ($this->dbh->connect_errno) {
			echo 'Database connection error/n';
			echo 'Error number' . $this->dbh->connect_errno . '/n';
			echo 'Error message' . $this->dbh->connect_error . '/n';
			die(); 
		}

	}

	public function query( $query ) {

	}

	public function get_results( $query = null ) {

	}
}