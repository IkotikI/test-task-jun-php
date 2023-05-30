<?php

function get_server_base_uri() {
	return 'http://' . $_SERVER['HTTP_HOST'];
}


function register_style( $path ) {

}

function the_styles() {
	echo '<link rel="stylesheet" href="'. get_server_base_uri() .'/content/assets/css/style.css">';
}

function the_title() {
	echo $_SERVER['REQUEST_URI'];
}