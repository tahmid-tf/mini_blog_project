<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Session;
use Core\CSRFToken;
use Models\Comment;
use Utils\LogNotifier;

Session::start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

//    var_dump($_SESSION['_csrf_token'] ?? 'NO SESSION TOKEN');
//    var_dump($_POST['_csrf_token']);

    echo 'Session ID: ' . session_id() . '<br>';

    if (!isset($_POST['_csrf_token']) || !CSRFToken::verify($_POST['_csrf_token'])) {
        die("Invalid CSRF Token");
    }

    $content = trim($_POST['content']);

    if (!empty($content)) {
        $notifier = new LogNotifier();
        $comment = new Comment($notifier);
        $comment->create(1, $content);
        echo "Comment created";
    }else{
        echo "Content cannot be empty";
    }
}else{
    echo "Invalid request";
}