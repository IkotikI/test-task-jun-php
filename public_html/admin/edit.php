<?php

require_once __DIR__ . '/admin.php';

$args = array('limit' => 20);
$query = new Post_Query($args);

print_r($query);