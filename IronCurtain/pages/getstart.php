<?php require "db.php" ?>
<!---->
<head>
	<title>Попасть на ЗБТ | Iron Curtain</title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<?php require "php/header.php" ?>
<body>
	<?php require "php/menu.php" ?>
	<div class="globalstore">
		<?php require "php/WorkInProgress.php" ?>
		<p id="hell">
			Заявки на ЗБТ
		</p>
		<p class="paragraph">
			<br>
			1. <a href="" id="golog">Подать заявку</a>.<br>
			2. Ожидать сообщения на почту с ответом.<br>
			3. Выполнить дальнейшие действия которые будут указаны в сообщение на почте.<br>
			<br>
			<div id="ifStart">
				В случае если вас приймут в команду тестеров то перейдите на данную <a href="/cbt.php" id="golog">странницу</a>.
			</div>
		</p>
	</div>
</body>
<?php require "php/footer.php" ?>