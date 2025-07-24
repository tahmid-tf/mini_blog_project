<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Core\CSRFToken;
use Core\Session;

Session::start();
$token = CSRFToken::generate();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Post a Comment</title>
    <?php echo 'Session ID: ' . session_id() . '<br>'; ?>
</head>
<body>
<h1>Post a Comment</h1>

<form method="post" action="process_comment.php">
    <textarea name="content" required></textarea><br><br>
    <input type="hidden" name="_csrf_token" value="<?= htmlspecialchars($token) ?>">
    <button type="submit">Post Comment</button>
</form>
</body>
</html>