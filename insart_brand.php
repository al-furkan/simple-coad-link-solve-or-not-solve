<?php

if(!isset($_SESSION['user_email'])){
  echo "<script>window.open('logina_admin.php?not_admin=you are not an admin','_self')</script>";
}
else{
 ?>



<form action="" method="post"style="padding:80px;">

  <b>Insert New Brand</b>
  <input type="text" name="new_brand" required>
  <input type="submit" name="add_brand" value="Add Brand">

</form>
<?php
include("include/db.php");
if(isset($_POST['add_brand'])){
$new_brand = $_POST['new_brand'];
$insart_brand ="INSERT INTO brand(brand_title) VALUES ('$new_brand')";

$run_brand = mysqli_query($database_connection, $insart_brand);

if($run_brand){
  echo "<script>alert('Insart Brand okkay!')</script>";
  echo "<script>window.open('admin.php?view_brands','_self')</script>";
}
}
?>
<?php } ?>
