<?php

namespace Interfaces;

class EmailNotifier implements Notifier
{
    public function send($message){
        // Simulate sending email
        echo "Sending Email: $message <br>";
    }
}