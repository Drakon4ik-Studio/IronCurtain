<?php require_once "db.php" ?>
<?php
	if ( isset($_SESSION['logged_user']) ) {
		echo '<meta http-equiv="refresh" content="0; url=/"';
	}
?>
<!---->
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<title>PDA | Iron Curtain</title>
    <script src="js/registration.js"></script>
</head>
<?php
	require_once "php/header.php";
	require_once "php/left.php";
	require_once "php/right.php";
?>
<body>
    <div class="ico">
        <div class="console" id="div1">
            <p class="consoleText">Console</p>
            <br>
            <p class="consoleText" id="status">/start</p>
        </div>
        <div class="consoleD">
            <p class="consoleText">ActiveStatus</p>
            <br>
            <p class="consoleText" id="activeStatus">Unknown</p>
        </div>
    </div>
    <script>
        registration();
    </script>
	<div class="centerFormR">
		<form action="signup" method="POST" class="formReg">
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
					if ( ($data['password2']) != $data['password']) {
						$errors[] = 'Пароли не совпадают!';
					}

					if (R::count('users', "login = ?", array($data['login'])) > 0 ) {
						$errors[] = 'Пользователь с таким логином зарегестрирован!';
					}

					if (R::count('users', "email = ?", array($data['email'])) > 0 ) {
						$errors[] = 'Email уже зарегестрирован!';
					}

					if (empty($errors)) {
					    //mysqli_select_db('ironcurtain');
						$user = R::dispense('users');
						$user->login = $data['login'];
						$user->email = $data['email'];
						$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
						R::store($user);
						echo 'Успешно';
						echo '<script>set3();</script>';
					}else {
						echo '<div id="errors">'.array_shift($errors).'</div>';
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
            <input type="button" value="ВХОД" onClick='location.href="/"' id="regLClick">
			<button type="sumbit" name="do_register" id="regClick">РЕГИСТРАЦИЯ</button>
		</form>
	</div>
</body>
<?php require_once "php/footer.php" ?>