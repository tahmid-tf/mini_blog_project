<?php

namespace Interfaces;
use Traits\Logger;
class LogNotifier implements Notifier{
    use Logger;

    public function send($message){
        $this->logAction("Notifier: $message");
    }
}