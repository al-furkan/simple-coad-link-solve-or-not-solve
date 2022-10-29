<?php

if(!isset($_SESSION['user_email'])){
  echo "<script>window.open('logina_admin.php?not_admin=you are not an admin','_self')</script>";
}
else{
 ?>

<table width="795" align= "center" bgcolor ="pink">

<tr align="center">
  <td colspan="6">
    <h2>View All Categorys</h2>
  </td>
</tr>
<tr align="center" bgcolor = "skyblue">
  <th>Catagori id</th>
  <th>Catagori Titel</th>
  <th>Edit</th>
  <th>Delete</th>
</tr>


<?php
include("include/db.php");
$get_cat = "SELECT * FROM catagoris";
$run_cat = mysqli_query($database_connection,$get_cat);
$i = 0;

while($row_cat = mysqli_fetch_array($run_cat)){
$cat_id =  $row_cat['cat_id'];
$cat_title = $row_cat['cat_title'];
$i++;

 ?>


<tr align="center" bgcolor = "green">
  <td><?php echo $i; ?></td>
  <td><?php echo $cat_title; ?></td>
  <td><a href="admin.php?edit_cat=<?php echo $cat_id; ?>">Edit</a> </td>
  <td><a href="delete_cat.php?delete_cat=<?php echo $cat_id; ?>">Delete</a> </td>
</tr>

<?php } ?>

</table>
<?php } ?>
