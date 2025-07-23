<?php

require_once __DIR__ .'/../../vendor/autoload.php';

use Core\Database;
use Models\Admin;
use Models\Guest;
use Core\Session;

use Models\Comment;

Session::start();


// Trial login

//$admin = new Admin(1,"Tahmid");
//$guest = new Guest();
//
//echo "Admin name: ".$admin->getName() . " | Role: ".$admin->getRole()."\n";
//echo "Guest name: ".$guest->getName() . " | Role: ".$guest->getRole()."\n";


$comment = new Comment();
//$result = $comment->create(1, "This is a comment");
//var_dump($result);
print_r($comment->getAll());


//$db = Database::getInstance()->getConnection();

//echo "Connection established successfully";