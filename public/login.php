<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Session;
use Core\CSRFToken;

Session::start();
$token = CSRFToken::generate();
session_write_close();

?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h1>Admin Login</h1>

<form method="post" action="process_login.php">
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <input type="hidden" name="_csrf_token" value="<?= htmlspecialchars($token) ?>">
    <button type="submit">Login</button>
</form>
</body>
</html>