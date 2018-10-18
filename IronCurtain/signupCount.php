<?php require "../db.php" ?>
<?php
    if ( ( $_SESSION['logged_user'] ) ) {
         echo '<meta http-equiv="refresh" content="0; url=/"';   
    }else {
    	
    }
?>
<?php mail('darkness.felcon@gmail.com', 'IronCurtain', '123'); ?>
<!---->
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	<title>Регистрация | Iron Curtain</title>
</head>
	<!--Шапка-->
	<?php require "../php/header.php" ?>
	<!---->
<body>
	<!--Меню-->
	<?php require "../php/menu.php" ?>
	<!---->
	<!--Основная часть-->
	<div class="globalstore">
		<!--Тех работы-->
		<?php require "../php/WorkInProgress.php" ?>
		<!---->
		<div class="signup">
			Шаг 2 из 2<br>
			<br>
			Для завершения регистрации вы должны потвердить адресс электронной почты.
			Письмо с инструкциями уже отправлено!
		</div>
	</div>
	<!---->
</body>
	<!--Подвал-->
	<?php require "../php/footer.php" ?>
	<!---->