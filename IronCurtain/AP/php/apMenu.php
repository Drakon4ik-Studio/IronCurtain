<div class="apMenu">
	<div class="apLvladm">
		<?php 
			if (isset($_SESSION['logged_user'])){
				switch ($_SESSION['logged_user']['status']) {
					case 0:
					    $status = "Игрок";
					    break;
					case 1:
					    $status = "Администратор";
					    break;
				}
				
				if (isset($status)) {
					echo "Вы ".$status;
				}else{
					echo 'Ошибка [aX1]';
				}
			}
		?>
	</div>
	<a href="/" id="b-apMenuG">На главную</a>
    <a href="/AP/pages/users.php" id="b-apMenu">Пользователи</a>
</div>