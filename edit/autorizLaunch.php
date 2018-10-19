<?php require "db.php" ?>
<?php
	if($_POST['btn_auth'] == true)
	{
		$user = R::findOne('users', 'login = ?', array($_POST['login']));
		if ( ($user) && (password_verify($_POST['password'], $user->password)))
		{
			echo('true');
		}
		else
		{
			echo('false');

			var_dump($user);
		}
	}
	else
	{
		echo('
			<form method="POST">
			Логин: <input type="text" name="login" />
			Пароль: <input type="password" name="password" />
			<input type="submit" value="Войти"" name="btn_auth" />
			</form>
		');
	}
?>



