<?php
/**
 * 
 */
class Role
{
	public $name;

	public $capabilities;
	
	function __construct( $role, $capabilities )
	{
		 $this->name = $name;
		 $this->capabilities = $capabilities;
	}
}