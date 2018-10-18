<?php require "db.php" ?>
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
		<div class="menuL">
			<?php if( isset($_SESSION['logged_user']) ) : ?>
				<div class="buttonAll">
	            	<a href="/AP/adminpanel" target="_blank" id="click">AP</a>
	        	</div>
		        <div class="buttonAll">
		        	<a href="/logout" id="click">Выход</a>
		       	</div>
	       	<?php else : ?>
	       		<div class="buttonAll">
	            	<a href="pages/accessdenied" id="clickAD">AP</a>
	        	</div>
	        	<div class="buttonAll">
	            	<a href="signup.php" id="clickAD">Регистрация</a>
	        	</div>
        	<?php endif; ?>
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
	<?php require "php/globalStr.php" ?>
</body>
<?php require "php/footer.php" ?>