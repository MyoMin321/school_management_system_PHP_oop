<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\CommentTable;

$id = $_POST['id'];
$post_id = $_POST['post_id'];

$table = new CommentTable(new MySQL());

if($table)
{
    $table->deleteComment($id);
    header("Location: ../user_post_detail.php?id=$post_id");
}
else
{
    echo "Error";
}