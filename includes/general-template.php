<?php

function get_header() {

	$file = PUBPATH . '/content/header.php';

	load_template($file);

}

function get_footer() {

	$file = PUBPATH . '/content/footer.php';
	load_template($file);
	
}

function get_template_part( $slug ) {

	$directories = array(
		PUBPATH . '/content', PUBPATH . '/content/templates'
	);

	foreach ($directories as $dir) {
		$file = $dir . "/{$slug}.php";
		// echo 'potentioal template: ' . $file . "\n";
		if ( file_exists( $file ) ) {
			load_template( $file );		
			return;
		}
	}

	echo "Tempalte {$slug} not found";

}