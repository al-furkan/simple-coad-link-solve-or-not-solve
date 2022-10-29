<?php
    session_start();
    $_SESSION["name"];
    $_SESSION["picture"];

    if(!isset($_SESSION["name"])){
     header('location:loginwork/login.php');
    }

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="homepage.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION["name"]; ?></title>
    <style>

    </style>
</head>

<body>
<img src="img/login.png" alt="ALL"height="100" width="1360" >
    <div class="naveber">
        <ul>
            <li float="right"><a href="loginwork/logout.php">logout</a></li>
        </ul>
    </div>


    <div class="wrapper">
        <!--Top menu -->
        <div class="sidebar">
            <!--profile image & text-->
            <div class="profile">
                <img src="loginwork/uplodeimg/<?php echo  $_SESSION["picture"]; ?>" alt="profile_picture">
                <h3><?php echo $_SESSION["name"]; ?></h3>
                <p>TS-SHOPPING</p>
            </div>
            <ul>
                <li>
                    <a href="homepage.php" class="active">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item">Home</span>
                    </a>
                </li>
                <li>
                    <a href="profile/profile.php">
                        <span class="icon"><i class="fas fa-prescription"></i></span>
                        <span class="item">YOUR-Profile</span>
                    </a>
                </li>
                <li>
                    <a href="aboutORcontact/about.php">
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item">About-US</span>
                    </a>
                </li>
                <li>
                    <a href="product/index.php">
                        <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="item">Product</span>
                    </a>
                </li>
                <li>
                    <a href="product/allproduct.php">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">ALL Product</span>
                    </a>
                </li>
                <li>
                    <a href="report.php">
                        <span class="icon"><i class="fas fa-chart-line"></i></span>
                        <span class="item">Reports</span>
                    </a>
                </li>
                <li>
                    <a href="aboutORcontact/contac.php">
                        <span class="icon"><i class="fas fa-user-shield"></i></span>
                        <span class="item">Contact</span>
                    </a>
                </li>
                <li>
                    <a href="setting.php">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="item">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="order/order.php" >
                        <span class="icon"><i class="fas fa-download"></i></span>
                        <span class="item">Order product</span>
                    </a>
                </li>
            </ul>
        </div>


    <div class="slider">
        <div class="rotator">
            <div class="items">
                <a href="product/index.php"> <img src="img/1.jpg" alt="items photo" /></a>
            </div>
            <div class="items">
                <a href="product/index.php"><img src="img/2.jpg" /></a>
            </div>
            <div class="items">
                <a href="product/index.php"> <img src="img/3.jpg" alt="items photo" /></a>
            </div>
            <div class="items">
                <a href="product/index.php"><img src="img/4.jpg" alt="items photo" /></a>
            </div>
            <div class="items">
                <a href="product/index.php"> <img src="img/5.jpg.jfif" /></a>
            </div>
            <div class="items">
                <a href="product/index.php"><img src="img/6.jpg.jfif" alt="items photo" /></a>
            </div>
            <div class="items">
                <a href="product/index.php"><img src="img/7.jpg" alt="items photo" /></a>
            </div>
            <div class="items">

                <a href="product/index.php"><img src="img/8.jpg.jfif" alt="items photo" /></a>
            </div>
            <div class="items">

                <a href="product/index.php"> <img src="img/9.jpg.jfif" alt="items photo" /></a>
            </div>
        </div>
    </div>

    </div>

</body>

</html>
