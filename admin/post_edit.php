<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\PostTable;
use Libs\Databases\CategoryTable;

$categories = new CategoryTable(new MySQL);
$posts_category = $categories->GetCategoryAllData();

$table = new PostTable(new MySQL());
$posts = $table->getAllPosts();
// echo "<pre>";
// print_r($posts);
// echo "</pre>";

include("includes/head.php"); ?>
<?php include("includes/extra_head.php"); ?>


<body class="sb-nav-fixed">
    <?php //include("includes/top_navbar.php"); ?>
    <div id="layoutSidenav">

        <?php include("includes/sidebar.php"); ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Post Edit</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">PostDashboard</li>
                    </ol>
                    <!-- display session alert -->
                    <?php if(isset($_GET['success']) && $_GET['success'] == true){ ?>
                    <div class="alert alert-success">
                        <strong>Success!</strong> Post has been updated.
                    </div>
                    <?php } else if(isset($_GET['error']) && $_GET['error'] == true){ ?>
                    <div class="alert alert-danger">
                        <strong>Error!</strong> Post has not been updated.
                    </div>
                    <?php } ?>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Post Edit <span class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">+ Add
                                Post</span>
                        </div>
                        <div class="card-body">
                            <!-- add to datatable -->
                            <form id="RegisterValidation" action="../_actions/post_edit.php" method="post"
                                enctype="multipart/form-data">
                                <div class="card ">
                                    <div class="card-header card-header-rose card-header-icon">

                                        <h4 class="card-title">Post Form</h4>
                                    </div>
                                    <div class="card-body ">
                                        <input type="hidden" name="id" value="<?= $id?>">
                                        <div class="form-group">
                                            <label for="Category" class="bmd-label-floating"> Post Title</label>
                                            <input type="text" name="title" class="form-control" required="true"
                                                value="<?= $posts->title; ?>">
                                        </div>
                                        <div class="form-group">
                                            <select name="category_id" class="selectpicker col-md-12" data-size="7"
                                                data-style="btn btn-primary btn-round" title="Single Select">
                                                <option value="<?php echo $posts_category->$id; ?>" disabled selected>
                                                    Select Category</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <textarea id="description" name="description"
                                                class="form-control "></textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img src="../assets/img/image_placeholder.jpg" alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="file_name" />
                                                    </span>
                                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                                        data-dismiss="fileinput"><i class="fa fa-times"></i>
                                                        Remove</a>
                                                </div>
                                            </div>
                                            <input type="hidden" name="user_id" value="<?= $auth->id; ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <input type="submit" value="New Create Post" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Modal -->

                </div>
            </main>
            <?php include("includes/footer.php"); ?>

            <?php include("includes/extra_js.php"); ?>


            <script>
            $(function() {
                CKEDITOR.replace('description');
                $(".textarea");
            });
            </script>