<?php
include("include/db.php");

if(isset($_GET['delete_cat'])){
$delete_id = $_GET['delete_cat'];
$delete_cat="DELETE FROM catagoris WHERE cat_id ='$delete_id'";

$run_delete = mysqli_query($database_connection, $delete_cat);

if($run_delete){
  echo "<script>alert('Delete okkay!')</script>";
  echo "<script>window.open('admin.php?view_cats','_self')</script>";
}

}

 ?>
