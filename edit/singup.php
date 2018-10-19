<?php require "db.php" ?>
<?php
	if ( isset($_SESSION['logged_user']) ) {
		echo '<meta http-equiv="refresh" content="0; url=/"';
	}else {
		
	}
?>
<!---->
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	<title>Регистрация | Iron Curtain</title>
</head>
<?php require "php/header.php" ?>
<body>
	<?php require "php/menu.php" ?>
	<div class="globalstore">
		<?php require "php/WorkInProgress.php" ?>
		<?php
			$data = $_POST;
			if ( isset($data['do_signup'])) {
				$errors = array();

				if ( trim($data['login']) == '') {
					$errors[] = 'Введите логин!';
				}
				if ( trim($data['email']) == '') {
					$errors[] = 'Введите Email!';
				}
				if ( trim($data['password']) == '') {
					$errors[] = 'Введите пароль!';
				}
				if ( ($data['password_2']) != $data['password']) {
					$errors[] = 'Пароли не совпадают!';
				}

				if (R::count('users', "login = ?", array($data['login'])) > 0 ) {
					$errors[] = 'Пользователь с таким логином зарегестрирован!';
				}

				if (R::count('users', "email = ?", array($data['email'])) > 0 ) {
					$errors[] = 'Email уже зарегестрирован!';
				}
				if (empty($errors)) {
					$user = R::dispense('users');
					$user->login = $data['login'];
					$user->email = $data['email'];
					$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
					R::store($user);
					echo 'Успешно';
				}else {
					echo '<div id="errorsReg">'.array_shift($errors).'</div>';
				}
			}
		?>
		<form action="/edit/singup.php" method="POST">
		<p>
			<p><strong>Ваш логин</strong>:</p>
			<input type="text" name="login" value="<?php echo @$data['login']; ?>" class="form">
		</p>
		<p>
			<p><strong>Ваш Email</strong>:</p>
			<input type="email" name="email" value="<?php echo @$data['email']; ?>" class="form">
		</p>
		<p>
			<p><strong>Ваш пароль</strong>:</p>
			<input type="password" name="password" class="form">
		</p>
		<p>
			<p><strong>Повторите пароль</strong>:</p>
			<input type="password" name="password_2" class="form">
		</p>
		<p>
			<button type="sumbit" name="do_signup" id="click">Зарегестрироваться</button>
		</p>
		</form>
	</div>
</body>
<?php require "php/footer.php" ?>