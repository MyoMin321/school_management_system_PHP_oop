<?
    include("../vendor/autoload.php");

    use Libs\Databases\MySQL;
    use libs\Databases\PostTable;

    $id = $_GET['id'];
    $table = new PostTable(new MySQL());
    $onPost = $table->PostDelete($id);

    if($onePost){
   echo "
      <script>
         alert('Your post is deleted.');
         window.location.replace('../admin/post_index.php');
      </script>
   ";
} else {
   echo "
      <script>
         alert('No data is available.');
         window.location.replace('../admin/post_index.php');
      </script>
   ";
}
?>