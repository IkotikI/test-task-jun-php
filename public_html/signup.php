<?php
require __DIR__ . '/app-load.php';

$name = '';
$login = '';
$password = '';
$password_confirm = '';
$name = '';
$result = array();

if ( isset( $_POST['action'] ) && $_POST['action'] == 'signup' ) {
	global $db;
	$data_acceptable = false;

	$name = $_POST['name'] ?? '';
	$login = $_POST['email'] ?? '';
	$password = $_POST['password'] ?? '';
	if ($_POST['password'] && $_POST['password_confirm'] && $_POST['password'] == $_POST['password_confirm'] ) {
		$password_confirm = $_POST['password_confirm'];
	}

	$password_hash = ($password) ? md5($_POST['password']) : '';

	if ($name && $login && $password) $data_acceptable = true;

	if ($data_acceptable) {

		$result = $db->get_results("SELECT * FROM `users` WHERE `login` = '$login' ");
		$result_a = $db->get_results("SELECT * FROM `users` WHERE `login` = '$login' ", ARRAY_A);

		if ($result->num_rows != 0) {
			$_SESSION['message']['status'] = 'error';
			$_SESSION['message']['text'] = 'Пользователь с таким логином уже существует.';
		} else {

			$db->query( "INSERT INTO `users` (`ID`, `login`, `password`, `nicename`) VALUES (NULL, '$login', '$password_hash', '$name') ");

			$_SESSION['message']['status'] = 'succsess';
			$_SESSION['message']['text'] = 'Регистрация прошла успешно! Теперь вы можете авторизироваться.';

			header('Location: login.php');

		}
	}
	else {
		$_SESSION['message']['status'] = 'error';
		$_SESSION['message']['text'] = 'Некорректно введены данные.';
	}
}

get_header();

echo '<pre>';
print_r($_POST);
print_r($result);
print_r($result_a);
global $db;
print_r($db);
echo '</pre>';
?>
	<h1>Sign Up</h1>
	<div class="pages">
		<section class="registration">
			<form class="registration-form" action="<?= $_SERVER['REQUEST_URI']; ?>" method="POST" class="login-form">
				<input type="text" name="name" placeholder="Name" value="<?= $name ?>" required>
				<input type="email" name="email" placeholder="Email" value="<?= $login ?>"  required>
				<input type="password" name="password" placeholder="Password" value="<?= $password ?>"  required>
				<input type="password" name="password_confirm" placeholder="Confirm Password" value="<?= $password_confirm ?>"  required>
				<input type="hidden" name="action" value="signup">
				<input class="btn" name="" type="submit" value="Signup">
				<?php if ( isset($_SESSION['message']) && $_SESSION['message']['status'] == 'error') : ?>
					<div class="registration-message-error" style="border-radius: 3px; border: 2px solid orange;">
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