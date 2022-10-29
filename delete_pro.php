<?php
include("include/db.php");
if(isset($_GET['delete_pro'])){
$delete_id = $_GET['delete_pro'];
$delete_pro="DELETE FROM product WHERE product_id ='$delete_id'";

$run_delete = mysqli_query($database_connection, $delete_pro);

if($run_delete){
  echo "<script>alert('Delete okkay!')</script>";
  echo "<script>window.open('admin.php?view_product','_self')</script>";
}

}
 ?>
