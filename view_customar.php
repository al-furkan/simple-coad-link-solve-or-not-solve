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
  <th>Name</th>
  <th>Email</th>
  <th>Picture</th>
  <th>Delete</th>
</tr>
<?php
include("include/db.php");
$get_p = "SELECT * FROM reginfo";
$run_p = mysqli_query($database_connection,$get_p);
$i = 0;

while($row_p = mysqli_fetch_array($run_p)){
$p_id =  $row_p['id'];
$p_name = $row_p['fullname'];
$p_email = $row_p['email'];
$p_imgs = $row_p['picture'];
$i++;

 ?>


<tr align="center" bgcolor = "green">
  <td><?php echo $i; ?></td>
  <td><?php echo $p_name; ?></td>
  <td><?php echo $p_email; ?></td>
  <td> <img src="../../loginwork/uplodeimg/<?php echo $p_imgs;?>" width ="60" height ="60"/></td>
  <td><a href="delete_c.php?delete_p=<?php echo $p_id; ?>">Delete</a></td>
</tr>

<?php } ?>

</table>
<?php } ?>
