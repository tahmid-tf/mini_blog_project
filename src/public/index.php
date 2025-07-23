<?php

require_once __DIR__ .'/../../vendor/autoload.php';

use Core\Database;

$db = Database::getInstance()->getConnection();

echo "Connection established successfully";