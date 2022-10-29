<?php
session_start();
  include('function/function.php');

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/indes.css" media="all" />
    <title>TS shopping</title>
</head>

<body>
    <!--main wappper statr here-->
    <div class="main-wapper">
        <div class="hader-wapper">
          <a href="index.php"><img id="logo" src="imgs/logo.jpg"></a>
            <img id="baner" src="imgs/baner.jpg" alt="">
        </div>

        <!--manuber  statr here-->
        <div class="manuber">
            <ul id="manu">
                <li><a href="index.php">Home</a></li>
                <li><a href="allproduct.php">ALL Products</a></li>
                <li><a href="../profile/profile.php">My Account</a></li>
                <li><a href="../loginwork/Ragisterpage.php"> Sing Up</a></li>
                <li><a href="#">Shopping Details</a></li>
                <li><a href="../aboutORcontact/contac.php">Contact Us</a></li>
                <li><a href="../aboutORcontact/about.php">About Us</a></li>

            </ul>
            <div id="form">
                <form method="get" action="results.php" enctype="multipart/form-data">
                    <input type="text" name="user_quary" placeholder="Search a Product" />
                    <input type="submit" name="search" value="search" />
                </form>
            </div>
        </div>

        <!--manuber end  here-->

        <!-- container state  here-->
        <div class="content-wapper">
            <div id="sideber">
                <div id="sideber-titel">Catagories</div>
                <ul class="bat">
                  <?php
                  getcats();
                   ?>
                </ul>
                <div id="sideber-titel">Brands</div>
                <ul class="bat">
                  <?php
                    getbrands();
                   ?>
                </ul>

            </div>

  <!-- product container start here-->
            <div id="content-area">
<!-- shopping_card container start here-->
            <div class="shopping_card">
               <span style="float:right; font-size:18px;padding:5px;line-height:40px">
                 Welcome Guest!<b style="color:yellow">Shopping Card:</b>
                 Total Items- <?php total_items();  ?> Total Prise- <?php total_prize();echo "taka"; ?>
                 <a href="buy.php" style="color:pink">Go to Buy</a>

               </span>
             </div>
             <?php getIp(); ?>

            <div class="product_box">

             <?php  getpro(); ?>
             <?php  getcatpro(); ?>
             <?php  getbrandpro(); ?>

                </div>

            </div>
        </div>
        <!-- container end here-->

        <!--footer  state here-->
        <div id="footer">

       <h2 style="text-align:center;padding-top:30px;">&copy; 2022 www.onlinemathtuting.com</h2>


        </div>

        <!--footer end here-->
    </div>

    <!--main wappper end here-->

</body>

</html>
