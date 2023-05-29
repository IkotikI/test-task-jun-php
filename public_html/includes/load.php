<?php 


if ( ! defined( 'ABSPATH' ) ) {
	echo 'ABSPATH is not defined';
	die;
}

// if ( ! defined( 'PUBPATH' ) ) {
// 	define( 'PBPATH', __DIR__ . '../public_html/' );
// }

// if ( ! defined( 'INCPATH' ) ) {
// 	define( 'INCPATH', __DIR__ . '/' );
// }
// echo PUBPATH;
require_once PUBPATH . '/config.php';

function require_db() {
	global $db;

	require_once INCPATH . '/class-db.php';

	if ( isset( $wpdb ) ) {
		return;
	}

	$dbuser     = defined( 'DB_USER' ) ? DB_USER : '';
	$dbpassword = defined( 'DB_PASSWORD' ) ? DB_PASSWORD : '';
	$dbname     = defined( 'DB_NAME' ) ? DB_NAME : '';
	$dbhost     = defined( 'DB_HOST' ) ? DB_HOST : '';

	$wpdb = new wpdb( $dbuser, $dbpassword, $dbname, $dbhost );
}

require_db();