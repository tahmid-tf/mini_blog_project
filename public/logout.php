<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Session;

Session::start();
Session::destroy();

echo "Logged out! <a href='login.php'>Login again</a>";