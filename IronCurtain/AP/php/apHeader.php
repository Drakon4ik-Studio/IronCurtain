<header class="apHeader">
    <div class="apLogo">
        <a href="/AP/adminpanel.php" id="apLogo">Админ Панель | Admin Panel</a>
    </div>
    <div class="apProfile">
		<?php if ( isset($_SESSION['logged_user']) ) : ?>
			Добро пожаловать, 
            <div class="apName">
                <?php echo $_SESSION['logged_user']->login; ?>
                <a href="/AP/pages/apExit.php" class="apExit">Выход</a>
            </div>
    	<?php endif; ?>
</header>