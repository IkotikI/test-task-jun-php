<?php

if ( ! defined( 'ABSPATH' ) ) {
	 define( 'ABSPATH', dirname( __DIR__ ) );
	// require '../abspath.php';
}

if ( ! defined( 'PUBPATH' ) ) {
	define( 'PUBPATH', ABSPATH . '/public_html' );
}

if ( ! defined( 'INCPATH' ) ) {
	define( 'INCPATH', ABSPATH . '/includes' );
}
//echo ABSPATH;
require INCPATH . '/load.php';

require INCPATH . '/template-loader.php';