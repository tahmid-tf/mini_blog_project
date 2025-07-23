<?php

require_once __DIR__ .'/../../vendor/autoload.php';

use Core\Session;
use Interfaces\EmailNotifier;
use Interfaces\LogNotifier;

Session::start();

// Email notification
//$emailNotifier = new EmailNotifier();
//$emailNotifier->send("A new comment was posted!");

// Log notification
$logNotifier = new LogNotifier();
$logNotifier->send("A new comment was posted and logged!");