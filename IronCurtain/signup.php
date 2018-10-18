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
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<title>PDA | Iron Curtain</title>
</head>
<?php
	require "php/header.php";
	require "php/left.php";
	require "php/right.php";
?>
<body>
	<div class="ico">
		<!-- ico -->
	</div>
	<div class="centerFormR">
		<form action="signup.php" method="POST" class="formReg">
			<?php
				$data = $_POST;
				if ( isset($data['do_register'])) {
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
						//mail('darkness.felcon@gmail.com', 'IronCurtain', '123');
						echo 'Успешно';
					}else {
						echo '<div id="errorsReg">'.array_shift($errors).'</div>';
					}
				}
			?>
			<div>
				<div class="fonL">
					<label for="regFormL" class="textReg">ЛОГИН:</label>
				</div>
				<input type="text" name="login" value="<?php echo @$data['login']; ?>" id="regFormL">
			</div>
			<div>
				<div class="fonE">
					<label for="regFormE" class="textReg">E-MAIL:</label>
				</div>
				<input type="email" name="email" value="<?php echo @$data['email']; ?>" id="regFormE">
			</div>
			<div>
				<div class="fonP">
					<label for="regFormP" class="textReg">ПАРОЛЬ:</label>
				</div>
				<input type="password" name="password" value="<?php echo @$data['password']; ?>" id="regFormP">
			</div>
			<div>
				<div class="fonP2">
					<label for="regFormP2" class="textReg">ПАРОЛЬ:</label>
				</div>
				<input type="password" name="password2" value="<?php echo @$data['password_2']; ?>" id="regFormP2">
			</div>
			<button type="sumbit" name="do_register" id="regClick">РЕГИСТРАЦИЯ</button>
		</form>
	</div>
</body>
<?php require "php/footer.php" ?>