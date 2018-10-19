<?php
    function logMessage($message) {
        $logFile = "log/IC-log.log";
        $hFile = fopen($logFile, 'a+');
        if (! is_resource($hFile)) {
            printf("FATAL ERROR: Do not ACCESS for log file", $logFile);
            return false;
        }
        fwrite($hFile, $message);
        fclose($hFile);
        return true;
    }