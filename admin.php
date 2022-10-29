<?php
session_start();
if(!isset($_SESSION['user_email'])){
  echo "<script>window.open('logina_admin.php?not_admin=you are not an admin','_self')</script>";
}
else{
 ?>
!<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>this is asmin panal</title>
    <link rel="stylesheet" href="style/style.css">
  </head>
  <body>
 <div class="main_wrapper">
   <div id="header">
     <div id="right">

      <h2 style="text-align:center;">Manage content:</h2>
      <a href="admin.php?insart_product">Insart Product</a>
      <a href="admin.php?view_product">View All Product</a>
      <a href="admin.php?insart_cat">Insart Catagori</a>
      <a href="admin.php?view_cats">View All Catagori</a>
      <a href="admin.php?insart_brand">Insart New Brand</a>
      <a href="admin.php?view_brands">View All Brand</a>
      <a href="admin.php?view_customar">View Castomar</a>
      <a href="admin.php?view_orders">View Order</a>
      <a href="admin.php?view_orders_d">View Exta ORder</a>
      <a href="logout.php">Admin Logout</a>

     </div>
     <div id="left">
         <h2 style="color: white;text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>
          <?php
           if(isset($_GET['insart_product'])){
             include("insart_product.php");
           }
           if(isset($_GET['view_product'])){
             include("view_product.php");
           }
           if(isset($_GET['edit_pro'])){
             include("edit_pro.php");
           }
           if(isset($_GET['insart_cat'])){
             include("insart_cat.php");
           }
           if(isset($_GET['view_cats'])){
             include("view_cats.php");
           }
           if(isset($_GET['edit_cat'])){
             include("edit_cat.php");
           }
           if(isset($_GET['insart_brand'])){
             include("insart_brand.php");
           }
           if(isset($_GET['view_brands'])){
             include("view_brands.php");
           }
           if(isset($_GET['edit_brand'])){
             include("edit_brand.php");
           }
           if(isset($_GET['view_customar'])){
             include("view_customar.php");
           }
           if(isset($_GET['view_orders'])){
             include("view_orders.php");
           }
           if(isset($_GET['view_orders_d'])){
             include("view_orders_d.php");
           }

           ?>
     </div>

   </div>

 </div>

  </body>
</html>
<?php } ?>
