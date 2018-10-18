<?php
	function logMessage($message) {
		$logFile = 'log/AP.log';
		$hFile = fopen($logFile, 'a+');

		if (! is_resource($hFile) ) {
			printf("Нельзя открыть для обновления. Провертье разрешения!", $logFile);
			return false;
		}

		fwrite($hFile, $message);
		fclose($hFile);

		return true;
	}