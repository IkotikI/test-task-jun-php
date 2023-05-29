<?php
require __DIR__ . '/app-load.php';
get_header();
?>
	<h1>Sign Up</h1>
	<div class="pages">
		<section class="registration">
			<form class="registration-form" action="actions.php" method="POST" class="login-form">
				<input type="text" name="name" placeholder="Name" required>
				<input type="email" name="email" placeholder="Email" required>
				<input type="password" name="password" placeholder="Password" required>
				<input type="password" name="password" placeholder="Repeate Password" required>
				<input type="hidden" name="action" value="signup">
				<input class="btn" name="" type="submit" value="Signup">
			</form>
		</section>
	</div>
<?php get_footer(); ?>