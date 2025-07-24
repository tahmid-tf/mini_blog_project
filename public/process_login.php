<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Session;
use Core\CSRFToken;
use Models\Admin;

Session::start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['_csrf_token']) || !CSRFToken::verify($_POST['_csrf_token'])) {
        die("Invalid CSRF Token");
    }

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    //Dummy credentials

    if ($username == "admin" && $password == "password") {
        $admin = new Admin(1,'Admin User');
        Session::set('user', serialize($admin));
        echo "Login successful! <a href='dashboard.php'>Go to Dashboard</a>";
    }else{
        echo "Invalid credentials";
    }
}else{
    echo "Invalid request";
}