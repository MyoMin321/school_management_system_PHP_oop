<?php include("layouts/head.php"); 
include("config/db_con.php"); 
include("functions.php");

?>

<body>
    <!-- Responsive navbar-->
    <?php include("layouts/navbar.php"); ?>
    <!-- Page header with logo and tagline-->
    <?php include("layouts/header.php"); ?>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4">
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM posts WHERE title LIKE '$search%' OR description LIKE '%$search'";
                    $result = mysqli_query($link,$sql);
                    $queryResult = mysqli_num_rows($result);
                    if($queryResult > 0){
                    while($row = mysqli_fetch_assoc($result)){
                    echo "<div class="card-body">
                        <div class='small text-muted'>
                            <p>Post on ".$row['created_at']."</p>
                        </div>
                        <h2 class="card-title">".$row['title']."</h2>
                        <p class="card-text">".substr($row['description'],0,100)."</p>
                        <a class='btn btn-primary' href='user_post_detail.php?id=".$row[' id']."'>Read more →</a>
                    </div>";
                    }
                    } else {
                    echo "There are no results matching your search!";
                    }
                </div>"
                }
                }
            </div>
        </div>
    </div>
    <!-- Nested row for non-featured blog posts-->

    <!-- Pagination-->

    </div>
    <!-- Side widgets-->
    <div class="col-lg-4">
        <!-- Search widget-->
        <?php include("layouts/search.php"); ?>
        <!-- Categories widget-->
        <?php include("layouts/category_sidebar.php"); ?>
        <!-- Side widget-->
        <?php include("layouts/side_widget.php"); ?>
    </div>
    </div>
    </div>
    <!-- Footer-->
    <?php include("layouts/footer.php"); ?>