<form action="login" method="POST">
	<?php
		$data = $_POST;
		if ( isset($data['do_login']) ) {
			$errors = array();
			$user = R::findOne('users', 'login = ?', array($data['login']) );
			if ( $user) {
				if ( password_verify($data['password'], $user->password) ) {
					$_SESSION['logged_user'] = $user;
					echo '<meta http-equiv="refresh" content="0; url=/"';
				}else {
					$errors[] = 'Неверный пароль!';
				}
			}else {
				$errors[] = 'Пользователь не найден!';
			}
			if ( ! empty($errors) ) {
				echo '<div class="errors">'.array_shift($errors).'</div>';
			}
		}
	?>
	<div>
		<div class="fonL">
			<label for="auzFormL">Логин:</label>
		</div>
		<input type="text" name="login" value="<?php echo @$data['login']; ?>" id="auzFormL">
	</div>
	<br>
	<div>
		<div class="fonP">
			<label for="auzFormP">Пароль:</label>
		</div>
		<input type="password" name="password" value="<?php echo @$data['password']; ?>" id="auzFormP">
	</div>
	<button type="sumbit" name="do_login" id="click">Войти</button>
</form>