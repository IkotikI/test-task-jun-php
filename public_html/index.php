<?php
/**
 * 
 */

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Any syntax errors here will result in a blank screen in the browser

require __DIR__ . '/app-load.php';

get_template_part('index');

// echo 'ZA WARDO';