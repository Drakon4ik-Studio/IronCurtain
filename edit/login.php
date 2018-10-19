<?php require "db.php" ?>
<?php
	if ( isset($_SESSION['logged_user']) ) {
		echo '<meta http-equiv="refresh" content="0; url=/"';
	}else {

	}
?>
<?php
	//require "Debug/debugSys.php";
	//logMessage($message);
?>
<!---->
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="/js/scripts/anime.min.js"></script>
	<title>Получение доступа | Iron Curtain</title>
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
	<div class="centerForm">
		<form action="login.php" method="POST" class="formLogin">
			<?php
				$data = $_POST;
				if ( isset($data['do_login']) ) {
					$errors = array();
					$user = R::findOne('users', 'login = ?', array($data['login']) );
					$userM = R::findOne('users', 'email = ?', array($data['login']) );
					if ( $user ) {
						if ( password_verify($data['password'], $user->password) ) {
							$_SESSION['logged_user'] = $user;
							echo '<meta http-equiv="refresh" content="0; url=/"';
						}else {
							$errors[] = 'Неверный пароль!';
						}
					}elseif ( $userM ) {
						if ( password_verify($data['password'], $userM->password) ) {
							$_SESSION['logged_user'] = $userM;
							echo '<meta http-equiv="refresh" content="0; url=/"';
						}else {
							$errors[] = 'Неверный пароль!';
						}
					}else {
						$errors[] = 'Пользователь не найден!';
					}
					if ( ! empty($errors) ) {
						echo '<div class="errors">'.array_shift($errors) . '</div>';
					}
				}
			?>
			<div>
				<div class="fonL">
					<label for="auzFormL" class="textLog">Логин/EMail:</label>
				</div>
				<input type="text" name="login" value="<?php echo @$data['login']; ?>" id="auzFormL">
			</div>
			<div>
				<div class="fonP">
					<label for="auzFormP" class="textLog">Пароль:</label>
				</div>
				<input type="password" name="password" value="<?php echo @$data['password']; ?>" id="auzFormP">
			</div>
            <a href="signup.php" id="logRegClick">РЕГИСТРАЦИЯ</a>
			<button type="sumbit" name="do_login" id="logClick">АВТОРИЗИРОВАТЬСЯ</button>
		</form>
	</div>
</body>
<?php require "php/footer.php" ?>