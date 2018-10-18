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

			?>
		</table>
	</div>
</body>
<?php require "../php/apFooter.php" ?>