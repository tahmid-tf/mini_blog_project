<?php

namespace Traits;

trait Logger
{
    protected function logAction($message)
    {
        $logFile = __DIR__ . '/../../logs/app.log';
        $date = date('Y-m-d H:i:s');
        file_put_contents($logFile, "[$date] $message" . PHP_EOL, FILE_APPEND);
    }
}