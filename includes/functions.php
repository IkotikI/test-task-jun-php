<?php

function register_style( $path ) {

}

function the_styles() {
	echo '<link rel="stylesheet" href="content/assets/css/style.css">';
}

function the_title() {
	echo $_SERVER['REQUEST_URI'];
}