<?php 
include("../vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\CategoryTable;

$data =[
"category_name" => $_POST['category_name']
];

// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();

$table = new CategoryTable(new MySQL());

//$role = $table->CreateRole($data);

if($table){
 $table->CreateCategory($data);
 header("Location: ../admin/category_index.php?addsuccess=true ");
} else {
 header("Location: ../admin/category_index.php", "error=true");
}