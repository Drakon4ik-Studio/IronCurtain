function redirect (link, type, time) {
    setTimeout(function () {
        window.open(link, type);
    }, time);
}