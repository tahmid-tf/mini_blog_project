<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Session;
use Core\CSRFToken;
use Models\Comment;
use Models\Admin;
use Models\Guest;

Session::start();

$suer = Session::get("user") ? unserialize(Session::get("user")) : null;

if (!$suer || $suer->getRole() != "admin") {
    die("You are not allowed to access this page.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['_csrf_token']) || !CSRFToken::verify($_POST['_csrf_token'])) {
        die("Invalid CSRF token.");
    }

    $commentId = intval($_POST['id']);
    if ($commentId > 0) {
        $comment = new Comment();
        $comment->delete($commentId);

        echo "Comment deleted. <a href='comments.php'>Go back</a>";
    } else {
        echo "Invalid comment ID.";
    }
}else {
    echo "Invalid request.";
}