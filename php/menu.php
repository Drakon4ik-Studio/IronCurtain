<div class="leftMenu">
    <a href="/" id="buttonMenuM">Главная</a>
    <!--<a href="/getstart.php" id="buttonMenu">Попасть на ЗБТ</a>
    <a href="/cbt.php" id="buttonMenu">Закрытый Бета Тест</a>
    <a href="/" id="buttonMenuG">Режимы игры</a>-->
    <a href="https://vk.com/ironcurtainarma3" target="_blank" id="buttonMenuMM">Группа ВК</a>
	<?php
		if ( isset($_SESSION['logged_user']) ) {
			if ($_SESSION['logged_user']['status'] == 1) {
				echo("<a href='AP/adminpanel.php' id='buttonMenu'>Админ панель</a>");
			}
		}
	?>
</div>