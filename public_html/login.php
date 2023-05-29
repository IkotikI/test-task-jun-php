<?php
require __DIR__ . '/app-load.php';

$login = '';
$password = '';
$name = '';
$result = array();

if ( isset( $_POST['action'] ) && $_POST['action'] == 'login' ) {
	global $db;

	$login = $_POST['email'] ?? '';
	$password = $_POST['password'] ?? '';
	$password_hash = ($password) ? md5($_POST['password']) : '';

	$login_result = $db->get_results("SELECT * FROM `users` WHERE `login` = '$login' ");

	if($login_result->num_rows != 0) {

		$login_pass_result = $db->get_results("SELECT * FROM `users` WHERE `login` = '$login' AND ( `password` = '$password_hash' OR `password` = '$password' ) ");

		if ($login_pass_result->num_rows != 0) {

			$_SESSION['message']['status'] = 'succsess';
			$_SESSION['message']['text'] = 'Авторизированно успешно.';

			header('Location: /admin/index.php');

		} else {
			$_SESSION['message']['status'] = 'error';
			$_SESSION['message']['text'] = 'Неверный пароль.';
		}

	} else {
		$_SESSION['message']['status'] = 'error';
		$_SESSION['message']['text'] = 'Пользователь с таким логином не найден.';
	}
}

get_header();

print_r($_POST);
print_r($result);
print_r( ($_SESSION['message']) ?? 'No message' );
?>
	<h1>Log In</h1>
	<div class="pages">
		<section class="registration">
			<form class="registration-form" action="<?= $_SERVER['REQUEST_URI']; ?>" method="POST" class="login-form">
				<input type="email" name="email" placeholder="Email" value="<?= $login ?>"  required>
				<input type="password" name="password" placeholder="Password" value="<?= $password ?>"  required>
				<input type="hidden" name="action" value="login">
				<input class="btn" name="" type="submit" value="Signup">
				<?php if ( isset($_SESSION['message']) ) :
					if ( $_SESSION['message']['status'] == 'error' ) : ?>
						<div class="registration-message registration-message-error">
					<?php endif;
					if ( $_SESSION['message']['status'] == 'succsess' ) : ?>
						<div class="registration-message registration-message-succsess">
					<?php endif; ?>
						<?php
							echo $_SESSION['message']['text'];
							unset($_SESSION['message']);
						 ?>
					</div>
				<?php endif; ?>
			</form>
		</section>
	</div>

<?php get_footer(); ?>