<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Session;
use Core\CSRFToken;
use Models\Comment;
use Models\Guest;

Session::start();

$user = Session::get("user") ? unserialize(Session::get("user")) : new Guest();

$commentObj = new Comment();
$comments = $commentObj->getAll();
$token = CsrfToken::generate();
session_write_close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>All Comments</title>
</head>
<body>

<h1>All Comments</h1>

<p>Hello, <?= htmlspecialchars($user->getName()) ?> | Role: <?= $user->getRole() ?></p>
<p><a href="comment.php">Post a comment</a></p>

<?php if ($user->getRole() === 'admin'): ?>
    <p><a href="logout.php">Logout</a></p>
<?php else: ?>
    <p><a href="login.php">Login as Admin</a></p>
<?php endif; ?>

<hr>

<?php foreach ($comments as $comment): ?>
    <div style="border:1px solid #ccc; padding:10px; margin:10px 0;">
        <p><strong><?= htmlspecialchars($comment['name']) ?></strong> wrote:</p>
        <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
        <small><?= $comment['created_at'] ?></small>
        <?php if ($user->getRole() === 'admin'): ?>
            <form method="post" action="delete_comment.php" style="margin-top:10px;">
                <input type="hidden" name="id" value="<?= $comment['comment_id'] ?>">
                <input type="hidden" name="_csrf_token" value="<?= htmlspecialchars($token) ?>">
                <button type="submit" onclick="return confirm('Delete this comment?')">Delete</button>
            </form>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

</body>
</html>