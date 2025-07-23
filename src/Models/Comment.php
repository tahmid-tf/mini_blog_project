<?php

namespace Models;
use Core\Database;
use PDO;
use PDOException;

class Comment{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function create($userId, $content){
        $stmt = $this->pdo->prepare("INSERT INTO comments (user_id, content, created_at) VALUES (:user_id, :content, NOW())");
        return $stmt->execute([
            'user_id' => $userId,
            'content' => $content
        ]);
    }

    public function getAll(){
        $stmt = $this->pdo->query("SELECT * FROM `comments` JOIN users ON users.id = comments.user_id ORDER BY comments.created_at DESC;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM comments WHERE id = :id");
        $stmt->execute([
            'id' => $id
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $content){
        $stmt = $this->pdo->prepare("UPDATE comments SET content = :content WHERE id = :id");
       return $stmt->execute([
            'content' => $content,
        ]);
    }

    public function delete($id){
        $stmt = $this->pdo->prepare("DELETE FROM comments WHERE id = :id");
        return $stmt->execute([
            'id' => $id
        ]);
    }
}