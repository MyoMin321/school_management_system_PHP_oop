<?php 

    include("../vendor/autoload.php");

    use Libs\Databases\MySQL;
    use Libs\Databases\CommentTable;
    use Helpers\Auth;
    $auth = Auth::check();

    $data = [
        'post_id' => $_POST['post_id'],
        'comment' => $_POST['comment'],
        'user_id' => $auth->id,
    ];

    // echo $auth -> id;

    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";

    $table = new CommentTable(new MySQL());
    $comment = $table->CommentCreate($data);

    // echo "<pre>";
    // print_r($comment);
    // echo "</pre>";

    if($comment){
 header("Location: ../user_post_detail.php?id=$data[post_id]");
}else{
 echo "Error";
}