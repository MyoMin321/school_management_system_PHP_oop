<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\ClassTable;

$table = new ClassTable(new MySQL());
$classes = $table->GetClassAllData();


include("includes/head.php"); 
?>

<body class="sb-nav-fixed">

 <div id="layoutSidenav">
  <?php include("includes/sidebar.php"); ?>
  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Class Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active"><?php echo $auth->name; ?> : Dashboard</li>
     </ol>

     <?php if(isset($_GET['success']) && $_GET['success'] == true){ ?>
     <div class="alert alert-success">
      <strong>Success!</strong> Class has been updated.
     </div>
     <?php } else if(isset($_GET['error']) && $_GET['error'] == true){ ?>
     <div class="alert alert-danger">
      <strong>Error!</strong> Class has not been updated.
     </div>
     <?php } ?>

     <?php if(isset($_GET['delsuccess'])) : ?>
     <div class="alert alert-success">
      <strong>Success!</strong> Class has been Deleted.
     </div>
     <?php endif; ?>

     <?php if(isset($_GET['addsuccess'])) : ?>
     <div class="alert alert-success">
      <strong>Success!</strong> Class has been Created New Record.
     </div>
     <?php endif; ?>
     <?php //include("includes/top_card.php"); ?>
     <?php //include("includes/bar_chart.php"); ?>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       <h4>Class List
        <?php if($auth->value == '3') : ?>
        <span class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Add
         Class</span>
        <?php endif; ?>
       </h4>
      </div>
      <div class="card-body">
       <!-- Add Datatable -->
       <table id="datatablesSimple">
        <thead>
         <tr>
          <th>ID</th>
          <th>Class Name</th>
          <th>Class Code</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Action</th>
         </tr>
        </thead>
        <tbody>
         <?php foreach($classes as $code) : ?>
         <tr>
          <td><?= $code->id; ?></td>
          <td><?= $code->class_name; ?></td>
          <td><?= $code->class_code; ?></td>
          <td><?= $code->created_at; ?></td>
          <td><?= $code->updated_at; ?></td>
          <td>
           <?php if($auth->value == '3'){ ?>
           <a href="class_edit.php?id=<?= $code->id; ?>" class="btn btn-primary">Edit</a>
           <?php } ; ?>
           <a href="class_detail.php?id=<?= $code->id; ?>" class="btn btn-info">Show</a>
           <?php if($auth->value == '3'){ ?>
           <a href="../_actions/class_delete.php?id=<?= $code->id; ?>" class="btn btn-danger">Delete</a>
           <?php } ; ?>
         </tr>
         <?php endforeach; ?>
        </tbody>
       </table>
      </div>
     </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Class Create</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
        <form action="../_actions/class_create.php" method="POST">
         <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Class Name</label>
          <input type="text" name="class_name" class="form-control" id="exampleInputEmail1"
           placeholder="Enter Class Name">
         </div>
         <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Class Code</label>
          <input type="number" name="class_code" class="form-control" id="">
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Create New Class">
         </div>
        </form>
       </div>

      </div>
     </div>
    </div>
   </main>
   <?php include("includes/footer.php"); ?>