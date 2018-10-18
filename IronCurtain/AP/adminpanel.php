<?php require_once "../db.php" ?>
<?php
if ( isset ( $_SESSION['logged_user'] ) ) {
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
    <link rel="stylesheet" type="text/css" href="css/AP.css"/>
    <title>AP | Iron Curtain</title>
</head>
<?php
    require_once "php/header.php";
    require_once "php/left.php";
    require_once "php/right.php";
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
                <a href="/AP/pages/users.php" id="click">USER</a>
            </div>
        </div>
        <div class="profiler">
            <?php //echo $_SESSION['logged_user']->login; ?>
        </div>
        <div class="profilerP">
            ********
        </div>
    </div>
    <div class="globalstore">

    </div>
</body>
<?php require_once "php/footer.php" ?>