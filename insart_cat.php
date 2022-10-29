<?php

if(!isset($_SESSION['user_email'])){
  echo "<script>window.open('logina_admin.php?not_admin=you are not an admin','_self')</script>";
}
else{
 ?>


<form action="" method="post"style="padding:80px;">

  <b>Insert New Catagory</b>
  <input type="text" name="new_cat" required>
  <input type="submit" name="add_cat" value="Add Category">

</form>
<?php
include("include/db.php");
if(isset($_POST['add_cat'])){
$new_cat = $_POST['new_cat'];
$insart_cat ="INSERT INTO catagoris(cat_title) VALUES ('$new_cat')";

$run_cat = mysqli_query($database_connection, $insart_cat);

if($run_cat){
  echo "<script>alert('Insart Catagori okkay!')</script>";
  echo "<script>window.open('admin.php?view_cats','_self')</script>";
}
}
?>
<?php } ?>
