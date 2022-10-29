<?php
include("include/db.php");

if(isset($_GET['delete_p'])){
$delete_id = $_GET['delete_p'];
$delete_p="DELETE FROM reginfo WHERE id ='$delete_id'";

$run_delete = mysqli_query($database_connection, $delete_p);

if($run_delete){
  echo "<script>alert('Delete okkay!')</script>";
  echo "<script>window.open('admin.php?view_customar','_self')</script>";
}

}

 ?>
