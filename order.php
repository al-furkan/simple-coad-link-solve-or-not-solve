<!DOCTYPE html>
 <?php
include('include/db.php');
?>
<html lang="en">

<head>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order_product</title>

</head>

<body bgcolor="skyblue">
  <img src="img/login.png" alt="ALL"height="120" width="1320" >
    <form action="order.php" method="post" enctype="multipart/form-data">
        <table align="center" width="700" border="5px" bgcolor="orange">
            <tr align="center">
                <td colspan="7" align="center">
                    <h2>Order Any Product</h2>
                </td>
            </tr>
            <tr>
                <td align="right"><b>নিজের নাম লিখুন :</b></td>
                <td>  <input type="text" name="name"required ></td>
            </tr>
            <tr>
                <td align="right"><b> ফোন নাম্বার লিখুন  :</b></td>
                <td><input type="text" name="phone" required></td>
            </tr>
            <tr>
                <td align="right"><b>যে ধরনের প্রোডাক্ট কিনতে চান তার নাম লিখুন  :</b></td>
                <td><input type="text" name="product_title" required></td>
            </tr>
            <tr>
                <td align="right"><b>যদি ফটো থাকে  যোগ  করুন : </b></td>
                <td><input type="file" name="product_img" required></td>
            </tr>
            <tr>
                <td align="right"><b>দাম জানা থাকলে লিখুন  :</b></td>
                <td><input type="text" name="product_price"required></td>
            </tr>
            <tr>
                <td align="right"><b>প্রোডাক্টটির বর্ণনা লিখুন যেন সঠিক জিনিসটা আপনার কাছে পৌঁছে দিতে পারি :</b></td>
                <td><textarea  id="mytextarea" name ="product_dis" cols ="20"rows="10"> </textarea></td>
            </tr>
            <tr>
                <td align="right"><b>প্রোডাক্টটির কালার অথবা ডিজাইন সম্পর্কে লিখবেন</b></td>
                <td><input type="text " name="product_color" size="50px" required></td>
            </tr>

            <tr align="center">
                <td colspan="7"><input type="submit" name="order_post" value="Order Now"></td>
            </tr>

        </table>
    </form>

</body>

</html>

<?php

if(isset($_POST['order_post'])){
//data field
$name =$_POST['name'];
$phone =$_POST['phone'];
$order_name =$_POST['product_title'];
$order_prise =$_POST['product_price'];
$product_disc =$_POST['product_dis'];
$product_color =$_POST['product_color'];

//img http_post_fields
 $product_img = $_FILES['product_img']['name'];
 $product_img_tem = $_FILES['product_img']['tmp_name'];

 move_uploaded_file($product_img_tem,"imgs/".$product_img);

$insert_order = "INSERT INTO customarord( name, orphone, orname, orimg, orpri, ordis, orclo)
VALUES ('$name','$phone','$order_name','$product_img','$order_prise','$product_disc','$product_color')";

$insart_pro = mysqli_query($database_connection , $insert_order);

if($insart_pro){
  echo "<script>alert('Your order Complete!')</script>";
  echo "<script>window.open('../homepage.php?order=your order complete','_self')</script>";
}

}

 ?>
