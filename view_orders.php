<?php
if(!isset($_SESSION['user_email'])){
  echo "<script>window.open('logina_admin.php?not_admin=you are not an admin','_self')</script>";
}
else{
 ?>



<table width="795" align= "center" bgcolor ="pink">



<tr align="center">
  <td colspan="8">
    <h2>View All Orders</h2>
  </td>
</tr>
<tr align="center" bgcolor = "skyblue">
  <th>S.N</th>
  <th>Name</th>
  <th>Email</th>
  <th>Address</th>
  <th>Titel</th>
  <th>Image</th>
  <th>Prise</th>
  <th>Details</th>
  <th>Delete</th>
</tr>
<?php
include("include/db.php");
$get_pro = "SELECT * FROM product_order";
$run_pro = mysqli_query($database_connection,$get_pro);
$i = 0;

while($row_pro = mysqli_fetch_array($run_pro)){
$pro_id =  $row_pro['or_id'];
$pro_name =  $row_pro['or_name'];
$pro_email =  $row_pro['or_email'];
$pro_add =  $row_pro['or_adr'];
$product_title = $row_pro['product_name'];
$product_imag = $row_pro['or_img'];
$product_prize = $row_pro['or_prize'];
$product_det = $row_pro['or_dis'];
$i++;

 ?>


<tr align="center" bgcolor = "green">
  <td><?php echo $i; ?></td>
  <td><?php echo $pro_name; ?></td>
  <td><?php echo $pro_email; ?></td>
  <td><?php echo $pro_add; ?></td>
  <td><?php echo $product_title; ?></td>
  <td> <img src="imgs/<?php echo $product_imag;?>" width ="60" height ="60"/></td>
  <td><?php echo $product_prize; ?></td>
  <td><?php echo $product_det; ?></td>
  <td><a href="delete_order.php?delete_or=<?php echo $pro_id; ?>">Delete</a> </td>
</tr>

<?php } ?>

</table>
<?php } ?>
