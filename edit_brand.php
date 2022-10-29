<?php
include("include/db.php");
if(!isset($_SESSION['user_email'])){
  echo "<script>window.open('logina_admin.php?not_admin=you are not an admin','_self')</script>";
}
else{
 if(isset($_GET['edit_brand'])){
   $brand_id = $_GET['edit_brand'];

   $get_brand = "SELECT * FROM brand WHERE brand_id ='$brand_id'";
   $run_brand = mysqli_query($database_connection,$get_brand);

   $row_brand = mysqli_fetch_array($run_brand);
   $brand_id = $row_brand['brand_id'];
   $brand_title = $row_brand['brand_title'];
 }
 ?>


<form action="" method="post"style="padding:80px;">

  <b>Edit Catagory</b>
  <input type="text" name="new_brand"value="<?php echo $brand_title; ?>" >
  <input type="submit" name="up_brand" value="Update Brand">

</form>
<?php

if(isset($_POST['up_brand'])){
  $update_id = $brand_id;
$new_brand = $_POST['new_brand'];
$up_brand ="UPDATE brand SET brand_title ='$new_brand' WHERE brand_id ='$update_id'";

$run_brand = mysqli_query($database_connection, $up_brand);

if($run_brand){
  echo "<script>alert('Brand Update okkay!')</script>";
  echo "<script>window.open('admin.php?view_brands','_self')</script>";
}
}
}
?>
