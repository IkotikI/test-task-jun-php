<?php

$GLOBALS['template_dirs'] = array(
								PUBPATH . '/content',
								PUBPATH . '/content/template-parts'
							);

function get_header( $slug = '' ) {
	global $template_dirs;

	foreach ($template_dirs as $dir) {
		$file = $dir . "/header-{$slug}.php";
		// echo 'potentioal template: ' . $file . "\n";
		if ( file_exists( $file ) ) {
			load_template( $file );		
			return;
		}
	}

	$file = PUBPATH . '/content/header.php';
	load_template($file);

}

function get_footer( $slug = '') {
	global $template_dirs;

	foreach ($template_dirs as $dir) {
		$file = $dir . "/footer-{$slug}.php";
		// echo 'potentioal template: ' . $file . "\n";
		if ( file_exists( $file ) ) {
			load_template( $file );		
			return;
		}
	}

	$file = PUBPATH . '/content/footer.php';
	load_template($file);
	
}

function get_template_part( $slug ) {
	global $template_dirs;

	foreach ($template_dirs as $dir) {
		$file = $dir . "/{$slug}.php";
		// echo 'potentioal template: ' . $file . "\n";
		if ( file_exists( $file ) ) {
			load_template( $file );		
			return;
		}
	}

	echo "Tempalte {$slug} not found";

}