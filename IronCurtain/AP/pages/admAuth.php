<?php require_once "../../db.php" ?>
<?php require_once '../programs/logistic.php'; ?>
<!---->
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../css/AP.css"/>
	<title>AP | Iron Curtain</title>
</head>
<?php
    require_once "../php/header.php";
    require_once "../php/left.php";
    require_once "../php/right.php";
?>
<body>
    <div class="ico">
        <!-- ico -->
    </div>
    <div class="centerForm">
        <div class="warning">
            Предупреждение!
            <br>
            Для доступа к админ панеле вы должны пройти повторную авторизацию
            <br>
            с последующим двух-этапным подтверждением!
        </div>
        <form action="admAuth" method="POST" class="formLogin">
            <?php
                $data = $_POST;
                if ( isset($data['do_login']) ) {
                    $errors = array ();
                    $user = R::findOne('users', 'login = ?', array($data['login']) );
                    $userM = R::findOne('users', 'email = ?', array($data['login']) );
                    if ( $user ) {
                        if ( password_verify($data['password'], $user->password) ) {
                            $_SESSION['logged_user'] = $user;
                            echo '<meta http-equiv="refresh" content="0; url=/AP/adminpanel"';
                            Application::$level = "[LOGIN]";
							Application::$mess = "Успешная авторизация. Доп сведения\n   IP- ";
							Application::check();
                        }else {
                        	$errors[] = 'Неверный пароль!';
                        	Application::$level = "[LOGIN]";
							Application::$mess = "Неудачная попытка авторизации. Доп сведения\n   Login- ". $user['login'] . "\n   IP- ";
							Application::check();
                        }
                    }elseif ( $userM ) {
                    	if ( password_verify($data['password'], $userM->password)) {
                    		$_SESSION['logged_user'] = $userM;
                    		echo '<meta http-equiv="refresh" content="0; url=/AP/adminpanel"';
                    		Application::$level = "[LOGIN]";
							Application::$mess = "Успешная авторизация. Доп сведения\n   IP- ";
							Application::check();
                    	}else {
                    		$errors[] = 'Неверный пароль!';
                    		Application::$level = "[LOGIN]";
							Application::$mess = "Неудачная попытка авторизации. Доп сведения\n   Login- ". $userM['login'] . "\n   IP- ";
							Application::check();
                    	}
                    }else {
                    	$errors[] = 'Пользователь не найден!';
                    	Application::$level = "[LOGIN]";
						Application::$mess = "Неудачная попытка авторизации. Доп сведения\n   IP- ";
						Application::check();
                    }
                    if ( ! empty($erorrs) ) {
                    	echo '<div class="errors"' . array_shift($errors) . '</div>';
                    }
                }
            ?>
            <div>
            	<div class="fonL">
            		<label for="auzFormL" class="textLog">ЛОГИН/EMAIL:</label>
            	</div>
            	<input type="text" name="login" value="<?php echo @$data['login']; ?>" id="auzFormL">
            </div>
            <div>
            	<div class="fonP">
            		<label for="auzFormP" class="textLog">ПАРОЛЬ:</label>
            	</div>
            	<input type="password" name="password" id="auzFormP">
            </div>
            <button type="sumbit" name="do_login" id="logClick">АВТОРИЗИРОВАТЬСЯ</button>
        </form>
    </div>
</body>
<?php require_once "../php/footer.php" ?>