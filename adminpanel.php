<?php require_once ('db.php'); ?>
<?php require_once ('log/logistic.php'); ?>
<!---->
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/apl.css"/>
    <script src="js/anime.min.js"></script>
    <script src="js/redirected.js"></script>
    <title>AP | Iron Curtain</title>
</head>
<body>
    <?php
        echo '<div class="infoText">Проверка...<br></div>';
        if (isset($_SESSION['logged_user'])) {
            echo '<div class="infoText">Проверка уровня доступа...<br></div>';
            if ($_SESSION['logged_user']->status == "2") {
                echo '<div id="Block_1"><input class="text"><div id="box"></div><div class="vox"</div></div>';
                echo '<script>
                        var Flog = document.querySelector(\'#Block_1 .text\');
                        var loads = anime({
                            targets: \'#box\',
                            translateX: 250,
                            delay: 1000
                        });
                        var promise = loads.finished.then(logFinished);
                        loads.finished.then(site);
                        function logFinished() {
                            Flog.value = \'Доступ разрешон\';
                            setTimeout(function () {
                                promise = loads.finished.then(logFinished);
                            });
                        }
                        function site() {
                            redirect("http://ironcurtain", "_self", 2000)
                        }
                        
                        loads.update = function (anim) {
                            if (!anim.completed) {
                                Flog.value = \'\';
                            }
                        }
                    </script>';
            } else {
                echo '<div class="infoText">В доступе отказано!<br>Перенаправление...</div>';
                $userName = $_SESSION['logged_user']->login;
                $userEmail = $_SESSION['logged_user']->email;
                Logister::$level = "[WARNING]";
                Logister::$message = "Кто-то пытался войти в админ панель с уровнем допуска ниже 2-го." . " Nick,Email= " . $userName . "," . $userEmail;
                Logister::log();
                echo '<script>redirect("http://ironcurtain", "_self", 2000);</script>';
            }
        } else {
            echo '<div class="infoText">Вы не авторизированы!. Требуеться авторизация<br>Перенаправление...<br></div>';
            echo '<script>redirect("http://ironcurtain", "_self", 2000);</script>';
        }
    ?>
</body>