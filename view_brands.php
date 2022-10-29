<?php

if(!isset($_SESSION['user_email'])){
  echo "<script>window.open('logina_admin.php?not_admin=you are not an admin','_self')</script>";
}
else{
 ?>


<table width="795" align= "center" bgcolor ="pink">

<tr align="center">
  <td colspan="6">
    <h2>View All Brands</h2>
  </td>
</tr>
<tr align="center" bgcolor = "skyblue">
  <th>Brand id</th>
  <th>Brand Titel</th>
  <th>Edit</th>
  <th>Delete</th>
</tr>


<?php
include("include/db.php");
$get_brand = "SELECT * FROM brand";
$run_brand = mysqli_query($database_connection,$get_brand);
$i = 0;

while($row_brand = mysqli_fetch_array($run_brand)){
$brand_id =  $row_brand['brand_id'];
$brand_title = $row_brand['brand_title'];
$i++;

 ?>


<tr align="center" bgcolor = "green">
  <td><?php echo $i; ?></td>
  <td><?php echo $brand_title; ?></td>
  <td><a href="admin.php?edit_brand=<?php echo $brand_id; ?>">Edit</a> </td>
  <td><a href="delete_brand.php?delete_brand=<?php echo $brand_id; ?>">Delete</a> </td>
</tr>

<?php } ?>

</table>
<?php } ?>
