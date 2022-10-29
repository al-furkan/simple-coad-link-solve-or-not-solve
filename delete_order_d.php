<?php
include("include/db.php");
if(isset($_GET['delete_or_d'])){
$delete_id = $_GET['delete_or_d'];
$delete_pro="DELETE FROM customarord WHERE id ='$delete_id'";

$run_delete = mysqli_query($database_connection, $delete_pro);

if($run_delete){
  echo "<script>alert('Delete okkay!')</script>";
  echo "<script>window.open('admin.php?view_orders_d','_self')</script>";
}

}
 ?>
