var text0 = 'status';
var div0 = 'div1';
var text1 = 'activeStatus';
var message0 = '/start';
var massage0;
function registration() {
    var list = document.getElementById(div0);
    list.addEventListener("animationend",animEnd);
    function animEnd () {
        setTimeout(function () {
            message0 = message0 + '<br>Запуск';
            massage0 = 'Запуск';
            document.getElementById(text0).innerHTML = message0;
            document.getElementById(text1).innerHTML = massage0;
            set2();
        }, 1000);
    }

    function set2() {
        message0 = message0 +'<br>Ожидание...';
        massage0 = 'Ожидание';
        setTimeout(function () {
            document.getElementById(text0).innerHTML = message0;
            document.getElementById(text1).innerHTML = massage0;
        }, 2000);
    }
}
function set3() {
    message0 = message0 + '<br>/register';
    massage0 = 'Регистрация';
    document.getElementById(text0).innerHTML = message0;
    document.getElementById(text1).innerHTML = massage0;
}