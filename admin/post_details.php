<?php
    include ("../vendor/autoload.php");
    use Libs\Databases\MySQL;
    use Libs\Databases\PostTable;

    $arg = $_GET['id'];

    $table = new PostTable(new MySQL());
    $posts = $table->getPostById($arg);


    // echo "<pre>";
    // print_r($posts);
    // echo "</pre>";
?>

<?php include("includes/head.php"); ?>

<body class="sb-nav-fixed">
    <?php //include("includes/top_navbar.php"); ?>
    <div id="layoutSidenav">

        <?php include("includes/sidebar.php"); ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Post Details Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Post Dashboard</li>
                    </ol>
                    <?php //include("includes/top_card.php"); ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Posts Details
                        </div>
                        <div class="card-body">
                            <!-- add to datatable -->
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <td><?= $posts->id; ?></td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td><?= $posts->description; ?></td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td><?= $posts->category_id; ?></td>
                                </tr>
                                <tr>
                                    <th>Image</th>
                                    <td><img src="../_actions/post_img/<?= $posts->file_name; ?>"
                                            style=" max-width: 100px;" alt=""></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </main>
            <?php include("includes/footer.php"); ?>