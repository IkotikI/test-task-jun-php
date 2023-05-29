<?php
if ( ! $_SERVER['REQUEST_METHOD'] === 'POST') {
	die('Зачем вы тут?');
}

require __DIR__ . '/app-load.php';

if ( isset($_POST['action']) ) {

	switch ( $_POST['action'] ) {
		case 'signup':
			require INCPATH . '/signup.php';
		break;
		case 'login':
			require INCPATH . '/login.php';
		break;
	} 

}

print_r($_POST);