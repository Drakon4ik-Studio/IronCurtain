<?php
	function logMessage($message) {
		$LOGDIR = '/Debug';
		$logFile = $LOGDIR . 'ironcurtain.log';
		$hFile = fopen($logFile, 'a+'); //открытие для обновление или создания файла

		if(! is_resource($hFile)) {
			printf("Нельзя открыть $s для обновления. Проверьте разрешения.", $logFile);
			return false;
		}

		fwrite($hFile, $message);
		fclose($hFile);

		return true;
	}
?>