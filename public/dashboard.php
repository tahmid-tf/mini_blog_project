<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Session;
use Models\Admin;
use Models\Guest;

Session::start();

$user = Session::get('user');

if ($user) {
    $user = unserialize($user);
} else {
    $user = new Guest();
}

echo "Hello, " . $user->getName() . " | Role: " . $user->getRole() . "<br>";

if ($user->getRole() === 'admin') {
    echo "<a href='logout.php'>Logout</a>";
} else {
    echo "<a href='login.php'>Login</a>";
}