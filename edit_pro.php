<!DOCTYPE html>
 <?php
include("include/db.php");
if(!isset($_SESSION['user_email'])){
  echo "<script>window.open('logina_admin.php?not_admin=you are not an admin','_self')</script>";
}
else{

if(isset($_GET['edit_pro'])){
$get_id = $_GET['edit_pro'];

$get_pro = "SELECT * FROM product WHERE product_id ='$get_id'";
$run_pro = mysqli_query($database_connection,$get_pro);

$row_pro = mysqli_fetch_array($run_pro);
$pro_id = $row_pro['product_id'];
$pro_title = $row_pro['product_title'];
$pro_imag = $row_pro['product_imag'];
$pro_prize = $row_pro['product_prize'];
$pro_desc = $row_pro['product_discription'];
$pro_keyword = $row_pro['product_keword'];
$pro_cat = $row_pro['product_cat'];
$pro_brand = $row_pro['product_brand'];

$get_cat = "SELECT * FROM catagoris WHERE cat_id ='$pro_cat'";
$run_cat = mysqli_query($database_connection,$get_cat);
$row_cat = mysqli_fetch_array($run_cat);
$catagori_title = $row_cat['cat_title'];

$get_brand = "SELECT * FROM brand WHERE brand_id ='$pro_brand'";
$run_brand=mysqli_query($database_connection , $get_brand);
$row_brand=mysqli_fetch_array($run_brand);
$brand_title = $row_brand['brand_title'];



}



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
    <title>Updata Product</title>

</head>

<body bgcolor="skyblue">
    <form action="" method="post" enctype="multipart/form-data">
        <table align="center" width="795" border="5px" bgcolor="#187eae">
            <tr align="center">
                <td colspan="7" align="center">
                    <h2>Edit And Update Product</h2>
                </td>
            </tr>
            <tr>
                <td align="right"><b>Product Title</b></td>
                <td><input type="text " name="product_title" size="60" value="<?php echo $pro_title; ?>"></td>
            </tr>
            <tr>
                <td align="right"><b>Product Catagory</b></td>
                <td>
                    <select name="product_cat">
                        <option><?php echo $catagori_title; ?></option>
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
                      <option><?php echo $brand_title; ?></option>
                       <?php
                       $get_brand = "SELECT * FROM brand";
                       $ran_brand = mysqli_query($database_connection,$get_brand);

                       while($row_brand = mysqli_fetch_array($ran_brand)){

                        $brand_id =$row_brand['brand_id'];
                        $brand_title =$row_brand['brand_title'];

                     echo "<option value ='$brand_id'></option>";
                          }
                        ?>
                   </select>
                </td>
            </tr>
            <tr>
                <td align="right"><b>Product image</b></td>
                <td><input type="file" name="product_img"> <img src="imgs/<?php echo $pro_imag; ?>" width="60" height="60"> </td>
            </tr>
            <tr>
                <td align="right"><b>Product price</b></td>
                <td><input type="text" name="product_price" value="<?php echo $pro_prize; ?>"></td>
            </tr>
            <tr>
                <td align="right"><b>Product discription</b></td>
                <td><textarea  id="mytextarea" name ="product_dis" cols ="20"rows="10"><?php echo $pro_desc; ?></textarea></td>
            </tr>
            <tr>
                <td align="right"><b>Product keword</b></td>
                <td><input type="text " name="product_keword" size="50px" value="<?php echo $pro_keyword; ?>"></td>
            </tr>

            <tr align="center">
                <td colspan="7"><input type="submit" name="update_product" value="Update Product"></td>
            </tr>

        </table>


    </form>

</body>

</html>


<?php
if(isset($_POST['update_product'])){
//data field
$update_id = $pro_id;

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

$update_product="UPDATE product SET product_cat='$product_cat',product_brand='$product_brand',product_title='$product_title',product_prize='$product_price',product_discription='$product_disc',product_imag='$product_img',product_keword='$product_keword' WHERE product_id='$update_id'";

$insart_upa=mysqli_query($database_connection,$update_product);

if($insart_upa){
  echo "<script>alert('Update okkay!')</script>";
  echo "<script>window.open('admin.php?view_product','_self')</script>";
}

}

 ?>
<?php } ?>
