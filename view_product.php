<?php
if(!isset($_SESSION['user_email'])){
  echo "<script>window.open('logina_admin.php?not_admin=you are not an admin','_self')</script>";
}
else{
 ?>



<table width="795" align= "center" bgcolor ="pink">



<tr align="center">
  <td colspan="6">
    <h2>View All Product</h2>
  </td>
</tr>
<tr align="center" bgcolor = "skyblue">
  <th>S.N</th>
  <th>Titel</th>
  <th>Image</th>
  <th>Prise</th>
  <th>Edit</th>
  <th>Delete</th>
</tr>
<?php
include("include/db.php");
$get_pro = "SELECT * FROM product";
$run_pro = mysqli_query($database_connection,$get_pro);
$i = 0;

while($row_pro = mysqli_fetch_array($run_pro)){
$pro_id =  $row_pro['product_id'];
$product_title = $row_pro['product_title'];
$product_imag = $row_pro['product_imag'];
$product_prize = $row_pro['product_prize'];
$i++;

 ?>


<tr align="center" bgcolor = "green">
  <td><?php echo $i; ?></td>
  <td><?php echo $product_title; ?></td>
  <td> <img src="imgs/<?php echo $product_imag;?>" width ="60" height ="60"/></td>
  <td><?php echo $product_prize; ?></td>
  <td><a href="admin.php?edit_pro=<?php echo $pro_id; ?>">Edit</a> </td>
  <td><a href="delete_pro.php?delete_pro=<?php echo $pro_id; ?>">Delete</a> </td>
</tr>

<?php } ?>

</table>
<?php } ?>
