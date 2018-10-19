<?php
    class Logister {
        public static $level;
        public static $message;
        public static function log() {
            require_once ('logister.php');
            $time = date(DATE_RFC822);
            $ip = $_SERVER['REMOTE_ADDR'];
            $browers = $_SERVER['HTTP_USER_AGENT'];
            $level = Logister::$level;
            $message = Logister::$message;
            $log = "[" . $time . "]" . $message . "\n" . "[" . $ip . "]" . "\n[" . $browers . "]" . "\n";
            logMessage($log);
        }
    }