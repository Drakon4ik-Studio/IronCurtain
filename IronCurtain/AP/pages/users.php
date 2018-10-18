<?php require "../../db.php" ?>
<?php
    if ( ( $_SESSION['logged_user'] ) ) {
        if ( $_SESSION['logged_user']->status == "2") {

        }else {
            echo '<meta http-equiv="refresh" content="0; url=/AP/pages/admAuth"';
        }
    }else {
        echo '<meta http-equiv="refresh" content="0; url=/AP/pages/admAuth"';
    }
?>
<!---->
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../css/AP.css"/>
<!--	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>-->
	<title>AP/USER | Iron Curtain</title>
</head>
<?php
    require_once "../php/header.php";
    require_once "../php/left.php";
    require_once "../php/right.php";
?>
<body>
    <div class="ico">
        <div class="menuL">
            <div class="buttonAll">
                <a href="/AP/adminpanel" target="_blank" id="click">AP</a>
            </div>
            <div class="buttonAll">
                <a href="/AP/pages/exit" id="click">EXIT</a>
            </div>
            <div class="buttonAll">
                <a href="/AP/pages/user.php" id="click">USER</a>
            </div>
        </div>
        <div class="profiler">
            <?php echo $_SESSION['logged_user']->login; ?>
        </div>
        <div class="profilerP">
            ********
        </div>
    </div>
    <div class="globalstore">
        <table border="3">
            <?php
                $users = R::findAll('users');
                echo ('<tr> <td>ID</td> <td>Login</td> <td>E-MAIL</td> <td>Status</td> </tr>');
                foreach ($users as $user) {
                    switch ($user['status']) {
                        case 0:
                            $status = "Игрок";
                            break;
                        case 1:
                            $status = "Администратор";
                            break;
                        default:
                            $status = "UNKNOWN";
                            break;
                    }
                    echo ('<tr> <td>'.$user["id"].'</td> <td><a href="user.php?id='.$user["id"].'" target="_blank" class="aLogin">'.$user["login"].'</a></td> <td>'.$user["email"].'</td> <td>'.$status.'</td> </tr>');
                }
            ?>
        </table>
    </div>
</body>
<?php require_once "../php/footer.php" ?>