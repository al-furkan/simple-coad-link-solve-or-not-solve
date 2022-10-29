<?php
include("include/db.php");

if(isset($_GET['delete_brand'])){
$delete_id = $_GET['delete_brand'];
$delete_brand="DELETE FROM brand WHERE brand_id ='$delete_id'";

$run_delete = mysqli_query($database_connection, $delete_brand);

if($run_delete){
  echo "<script>alert('Delete okkay!')</script>";
  echo "<script>window.open('admin.php?view_brands','_self')</script>";
}

}

 ?>
