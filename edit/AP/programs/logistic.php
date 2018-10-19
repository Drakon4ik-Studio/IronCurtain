<?php
	class Application {
		public static $level = "[INFO]";
		public static $mess = "Base Message\n-";
		public static function check() {
			require_once 'log/logister.php';
			$time = date(DATE_RFC822);
			$ipcheck = $_SERVER['REMOTE_ADDR'];
			$remacces = $_SERVER['HTTP_USER_AGENT'];
			$level = Application::$level;
			$mess = Application::$mess;
			$message = $time . " : " . $level . " - " . $mess . $ipcheck . "\n   Browser- " . $remacces . "\n";
			logMessage($message);
		}
	}
?>