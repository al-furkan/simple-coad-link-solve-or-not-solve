<?php
/*if(!isset($_SESSION['user_email'])){
  echo "<script>window.open('logina_admin.php?not_admin=you are not an admin','_self')</script>";
}
else{*/
 ?>

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
    <title>insart_product</title>

</head>

<body bgcolor="skyblue">
    <form action="insart_product.php" method="post" enctype="multipart/form-data">
        <table align="center" width="795" border="5px" bgcolor="#187eae">
            <tr align="center">
                <td colspan="7" align="center">
                    <h2>Insart New Post Here</h2>
                </td>
            </tr>
            <tr>
                <td align="right"><b>Product Title</b></td>
                <td><input type="text " name="product_title" required></td>
            </tr>
            <tr>
                <td align="right"><b>Product Catagory</b></td>
                <td>
                    <select name="product_cat">
                        <option> Select Product</option>
                         <?php
                         $get_cata = "SELECT * FROM catagoris";
                         $ran_cata = mysqli_query($database_connection,$get_cata);

                         while($row_cata = mysqli_fetch_array($ran_cata)){

                          $cata_id =$row_cata['cat_id'];
                          $cata_title =$row_cata['cat_title'];

                         echo "<option value ='$cata_id'>$cata_title</option>";
                      }
                          ?>
                     </select>
                </td>
            </tr>
            <tr>
                <td align="right"><b>Product brand</b></td>
                <td>
                  <select name="product_brand">
                      <option> Select brand</option>
                       <?php
                       $get_brand = "SELECT * FROM brand";
                       $ran_brand = mysqli_query($database_connection,$get_brand);

                       while($row_brand = mysqli_fetch_array($ran_brand)){

                        $brand_id =$row_brand['brand_id'];
                        $brand_title =$row_brand['brand_title'];

                     echo "<option value ='$brand_id'>$brand_title</option>";
                          }
                        ?>
                   </select>
                </td>
            </tr>
            <tr>
                <td align="right"><b>Product image</b></td>
                <td><input type="file" name="product_img" required></td>
            </tr>
            <tr>
                <td align="right"><b>Product price</b></td>
                <td><input type="text" name="product_price"required></td>
            </tr>
            <tr>
                <td align="right"><b>Product discription</b></td>
                <td><textarea  id="mytextarea" name ="product_dis" cols ="20"rows="10"> </textarea></td>
            </tr>
            <tr>
                <td align="right"><b>Product keword</b></td>
                <td><input type="text " name="product_keword" size="50px" required></td>
            </tr>

            <tr align="center">
                <td colspan="7"><input type="submit" name="insart_post" value="insart"></td>
            </tr>

        </table>


    </form>

</body>

</html>


<?php

if(isset($_POST['insart_post'])){
//data field
 $product_title =$_POST['product_title'];
 $product_cat =$_POST['product_cat'];
 $product_brand =$_POST['product_brand'];
 $product_price =$_POST['product_price'];

 $product_disc =$_POST['product_dis'];

 $product_keword =$_POST['product_keword'];

//img http_post_fields
 $product_img = $_FILES['product_img']['name'];
 $product_img_tem = $_FILES['product_img']['tmp_name'];

 move_uploaded_file($product_img_tem,"imgs/".$product_img);

$insert_product = "INSERT INTO product( product_cat, product_brand,
 product_title, product_prize, product_discription, product_imag, product_keword)
VALUES ('$product_cat','$product_brand','$product_title','$product_price','$product_disc','$product_img','$product_keword')";

$insart_pro = mysqli_query($database_connection , $insert_product);

if($insart_pro){
  echo "<script>alert('insart okkay!')</script>";
  echo "<script>window.open('admin.php?insart_product','_self')</script>";
}

}

 ?>
<?php //} ?>
