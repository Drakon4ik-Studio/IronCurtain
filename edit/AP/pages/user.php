<?php require "../../db.php" ?>
<?php
    if ( ( $_SESSION['logged_user'] ) ) {
            
    }else {
        echo '<meta http-equiv="refresh" content="0; url=/AP/pages/admAuth.php"';
    }
?>
<!---->
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../css/AP.css"/>
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<title>Пользователи АП | Iron Curtain</title>
</head>
<?php require "../php/apHeader.php" ?>
<body>
	<?php require "../php/apMenu.php" ?>
	<div class="globalstore">
		<table class="usersTable" border="3">
			<?php

				$user = R::getRow('SELECT * FROM users WHERE id='.$_GET['id']);
				echo('<tr> <td>id</td> <td>Логин</td> <td>E-Mail</td> <td>Статус</td></tr>');

				$test='';

				$statusName[0]="игрок";
				$statusName[1]="Администратор";

				for($i=0; $i<count($statusName); $i++){
					if($i == $user['status']){
						$test='<option value="'.$i.'">'.$statusName[$i].'</option>'.$test;
					}else{
						$test=$test.'<option value="'.$i.'">'.$statusName[$i].'</option>';
					}
				}

				echo('<tr> <td>'.$user["id"].'</td> <td>'.$user["login"].'</a></td> <td>'.$user["email"].'</td> <td><select>'.$test.'</select></td> </tr>');
			?>
		</table>	
		<p><input type="submit" value="Отправить"></p>	
	</div>	
</body>
<?php require "../php/apFooter.php" ?>


R::exec( 'UPDATE page SET title="test" WHERE id = 3' );