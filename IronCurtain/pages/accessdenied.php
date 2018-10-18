<?php require "../db.php" ?>
<?php
    if ( isset ( $_SESSION['logged_user'] ) ) {
        echo '<meta http-equiv="refresh" content="0; url=/"'; 
    }else {

    }
?>
<!---->
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	<title>PDA | Iron Curtain</title>
</head>
<?php
	require "../php/header.php";
	require "../php/left.php";
	require "../php/right.php";
?>
<body>
	<div class="ico">
		<div class="menuL">

		</div>
		<div class="profiler">
			<?php if ( isset($_SESSION['logged_user']) ) : ?>
				<?php echo $_SESSION['logged_user']->login; ?>
			<?php else : ?>
				ACCESS DENIED
			<?php endif; ?>
		</div>
		<div class="profilerP">
			<?php if ( isset($_SESSION['logged_user']) ) : ?>
				********
			<?php else : ?>

			<?php endif; ?>
		</div>
	</div>
	<div class="AD">
		ACCESS DENIED
		<br>
		В ДОСТУПЕ ОТКАЗАНО
		<br>
		<p class="infoAD">
			Вам отказано в доступе. Вы пытаетесь получить доступ к данным которые доступны только авторизированным пользователям. Рекомендуем вам авторизоваться.
		</p>
		<?php if (! isset($_SESSION['logged_user']) ) : ?>
			<div class="buttonAD">
	            <a href="/login" target="_blank" id="buttonAD">Авторизоваться</a>
	        </div>
	        <div class="buttonAD1">
	            <a href="/" target="_blank" id="buttonAD">Главная</a>
	        </div>
		<?php endif; ?>
	</div>
</body>
<?php require "../php/footer.php" ?>