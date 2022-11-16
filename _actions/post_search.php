<?php 

    include("vendor/autoload.php");

    use Libs\Databases\MySQL;
    use Libs\Databases\PostTable;

    $table = new PostTable(new MySQL());
    $search = $table->Search($search);

// include ("../config/db_con.php");
// $query = "SELECT * FROM posts WHERE title LIKE '%".$_POST["search"]."%' ORDER BY id DESC";
// $result = mysqli_query($link, $query);
// if(mysqli_num_rows($result) > 0) {

//  while($row = mysqli_fetch_array($result)) {
//   echo '
//   <div class="card mb-4">
//    <div class="card-body">
//     <h2 class="card-title">'.$row["title"].'</h2>
//     <p class="card-text">'.$row["description"].'</p>
//     <a href="post.php?id='.$row["id"].'" class="btn btn-primary">Read More &rarr;</a>
//    </div>
//    <div class="card-footer text-muted">
//     Posted on '.$row["created_at"].' by
//     <a href="#">'.$row["user_id"].'</a>
//    </div>
//   </div>
//   ';
//  }
// }


// include("../vendor/autoload.php");
// use Libs\Databases\MySQL;
// use Libs\Databases\PostTable;

// $data = [
//  'search' => $_POST['search']
// ];

// echo "<pre>";
// print_r($data);
// echo "</pre>";
// $table = new PostTable(new MySQL());
// $posts = $table->searchPost($data);
// echo "<pre>";
// var_dump($posts);
// echo "</pre>";

// foreach($posts as $post){
//  echo $post->title;
// }
// if($posts)
// {
//  foreach($posts as $post)
//  {
//   echo "<div class='card mb-4'>
//   <div class='card-body'>
//    <h2 class='card-title'>$post->title</h2>
//    <p class='card-text'>$post->description</p>
//    <a href='post.php?id=$post->id' class='btn btn-primary'>Read More &rarr;</a>
//   </div>
//   <div class='card-footer text-muted'>
//    Posted on $post->created_at by
//    <a href='#'>$post->user</a>
//   </div>
//  </div>";
//  }
// }
// ?>