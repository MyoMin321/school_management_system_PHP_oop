<?php

namespace Libs\Databases;

use PDO;
use PDOException;

class CommentTable
{
    private $db = null;

    public function __construct($db)
    {
        $this->db = $db->connect();
    }

    // get all posts from database join with categories and users
    public function CommentCreate($data)
 {
  try{
   $query = "INSERT INTO comments (user_id, post_id, comment, created_at) VALUES (:user_id, :post_id, :comment,  Now())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  }catch(PDOException $e){
   return $e->getMessage();
  }
 }

//  public function getPostComments($post_id){
//     try{
//         $query = "SELECT comments.*, users.id, posts.id FROM comments LEFT JOIN users ON posts.id = comment WHERE post_id = :post_id ORDER BY created_at DESC";
//         $statement = $this->db->prepare($query);
//         $statement->execute(['post_id'=>$post_id]);
//         return $statement->fetchAll(PDO::FETCH_OBJ);
//     }catch(PDOException $e){
//         $e->getMessage();
//     }
//  }

// get post comments by post id left join with users table
 public function getPostComments($id)
 {
  $statement = $this->db->prepare("
            SELECT comments.*, users.name AS user, users.photo AS profile
            FROM comments LEFT JOIN users
            ON comments.user_id = users.id
            WHERE comments.post_id = :id
            ORDER BY comments.id DESC
        ");
  $statement->execute([':id' => $id]);
  $rows = $statement->fetchAll();
  return $rows;
 }

 //delete comment

 // delete comment by id
    public function deleteComment($id)
    {
    $statement = $this->db->prepare("DELETE FROM comments WHERE id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount();
    }
}