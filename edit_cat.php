<?php
include("include/db.php");
if(!isset($_SESSION['user_email'])){
  echo "<script>window.open('logina_admin.php?not_admin=you are not an admin','_self')</script>";
}
else{
 if(isset($_GET['edit_cat'])){
   $cat_id = $_GET['edit_cat'];

   $get_cat = "SELECT * FROM catagoris WHERE cat_id ='$cat_id'";
   $run_cat = mysqli_query($database_connection,$get_cat);

   $row_cat = mysqli_fetch_array($run_cat);
   $cat_id = $row_cat['cat_id'];
   $cat_title = $row_cat['cat_title'];
 }
 ?>


<form action="" method="post"style="padding:80px;">

  <b>Edit Catagory</b>
  <input type="text" name="new_cat"value="<?php echo $cat_title; ?>" >
  <input type="submit" name="up_cat" value="Update Category">

</form>
<?php

if(isset($_POST['up_cat'])){
  $update_id = $cat_id;
$new_cat = $_POST['new_cat'];
$up_cat ="UPDATE catagoris SET cat_title ='$new_cat' WHERE cat_id ='$update_id'";

$run_cat = mysqli_query($database_connection, $up_cat);

if($run_cat){
  echo "<script>alert(' Catagori Update okkay!')</script>";
  echo "<script>window.open('admin.php?view_cats','_self')</script>";
}
}
}
?>
