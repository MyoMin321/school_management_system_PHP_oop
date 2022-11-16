<?php 
include("../vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\PostTable;

$data = [
 'id' => $_POST['id'],
 'title' => $_POST['title'],
 'category_id' => $_POST['category_id'],
 'description' => $_POST['description'],
 'user_id' => $_POST['user_id'], 
];
// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();

$table = new PostTable(new MySQL());
//$result = $table->StudentInfoUpdate($data);
// echo "<pre>";
// print_r($result);
// echo "</pre>";
// die();

$name = $_FILES['file_name']['name'];
$error = $_FILES['file_name']['error'];
$tmp = $_FILES['file_name']['tmp_name'];
$type = $_FILES['file_name']['type'];



// student info update
if($error){
    header("Location: ../admin/post_edit.php?error=file");
}

if ($type === "image/jpeg" or $type === "image/png") {
    if (($type === "image/jpeg" or $type === "image/png")) {
        if ($data['file_name'] != "") {
            $result = $table->PostUpdate($data);
            header("Location: ../admin/kg_st_info_index.php?success=student_info_update");
        } elseif ($data['file_name'] == "") {
            $result = $table->PostUpdate($data);
            header("Location: ../admin/kg_st_info_index.php?success=student_info_update");
        } else {
            header("Location: ../admin/kg_st_info_index.php?error=type");
        }
    }
}