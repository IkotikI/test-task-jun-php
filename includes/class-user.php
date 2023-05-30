<?php

/**
 * Basic class User
 */
class User
{
	public $data;
	
	public $ID = 0;

	public $caps = array();

	public $roles = array();
	
	function __construct()
	{
		// code...
	}

	public static function get_data_by( $field, $value ) {
		global $db;
	}

}