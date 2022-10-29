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
  <th>Phone</th>
  <th>Product</th>
  <th>Image</th>
  <th>Prise</th>
  <th>Details</th>
  <th>Color</th>
  <th>Delete</th>
</tr>
<?php
include("include/db.php");
$get_pro = "SELECT * FROM customarord";
$run_pro = mysqli_query($database_connection,$get_pro);
$i = 0;

while($row_pro = mysqli_fetch_array($run_pro)){
$pro_id =  $row_pro['id'];
$c_name =  $row_pro['name'];
$pro_email =  $row_pro['orphone'];
$pro_name =  $row_pro['orname'];
$product_imag = $row_pro['orimg'];
$product_prize = $row_pro['orpri'];
$product_det = $row_pro['ordis'];
$product_clr = $row_pro['orclo'];
$i++;

 ?>


<tr align="center" bgcolor = "green">
  <td><?php echo $i; ?></td>
  <td><?php echo $c_name; ?></td>
  <td><?php echo $pro_email; ?></td>
  <td><?php echo $pro_name; ?></td>
  <td> <img src="../../order/imgs/<?php echo $product_imag;?>" width ="60" height ="60"/></td>
  <td><?php echo $product_prize; ?></td>
  <td><?php echo $product_det; ?></td>
  <td><?php echo $product_clr; ?></td>
  <td><a href="delete_order_d.php?delete_or_d=<?php echo $pro_id; ?>">Delete</a> </td>
</tr>

<?php } ?>

</table>
<?php } ?>
