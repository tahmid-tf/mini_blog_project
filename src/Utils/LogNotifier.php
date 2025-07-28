<?php

namespace Utils;

use Interfaces\Notifier;

class LogNotifier implements Notifier
{
    protected string $logFile;

    public function __construct(string $logFile = __DIR__ . '/../../logs/notifications.log')
    {
        $this->logFile = $logFile;

        // Create directory if it doesn't exist
        if (!is_dir(dirname($this->logFile))) {
            mkdir(dirname($this->logFile), 0777, true);
        }
    }

    public function send($message)
    {
        $entry = "[" . date("Y-m-d H:i:s") . "] $message" . PHP_EOL;
        file_put_contents($this->logFile, $entry, FILE_APPEND);
    }
}
