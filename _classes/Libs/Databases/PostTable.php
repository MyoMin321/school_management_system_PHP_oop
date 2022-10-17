<?php

namespace Libs\Databases;

use PDO;
use PDOException;

class PostTable
{
    private $db = null;

    public function __construct($db)
    {
        $this->db = $db->connect();
    }

    // get all posts from database join with categories and users
    public function getAllPosts()
    {
        $statement = $this->db->prepare("
            SELECT posts.*, categories.category_name AS category, users.name AS user
            FROM posts LEFT JOIN categories
            ON posts.category_id = categories.id
            LEFT JOIN users
            ON posts.user_id = users.id
            ORDER BY posts.id DESC
        ");
        $statement->execute();
        $rows = $statement->fetchAll();
        return $rows;
    }

    public function PostCreate($data)
    {
        try {
            $query = "INSERT INTO posts (title, category_id, description, file_name, user_id, created_at) VALUES (:title, :category_id, :description, :file_name, :user_id, Now())";
            $statement = $this->db->prepare($query);
            $statement->execute($data);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}