<?php

  session_start();


          $massage = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
include('include/db.php');

$use_email = $_POST['phemail'];
$use_password = md5($_POST['ppassword']);

$chaking = mysqli_query($database_connection,"SELECT * FROM reginfo WHERE  email='$use_email'
OR phonenum='$use_email'AND password='$use_password'");

/*if($use_email=='furkan' AND $use_password == '@furkan2222'){
  header('location:../product/admin area/insart_product.php');
}*/

$cuntid= mysqli_num_rows($chaking);

$devided_value =  mysqli_fetch_array($chaking);


if(isset($_SESSION["name"])){
 header('location:../homepage.php');
}

if($cuntid==1){
$_SESSION["name"] =  $devided_value['fullname'];
$_SESSION["picture"] =  $devided_value['picture'];
$_SESSION["address"] =  $devided_value['Address'];
$_SESSION["email"] =  $devided_value['email'];
  header('location:../homepage.php');
}
else {

  $massage ="wrong email or password";
}

}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple webside</title>

</head>

<body>
  <img src="img/login.png" alt="ALL"height="120" width="1320" >
    <div class="log">

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>"method="POST"enctype="multipart/form-data">
            <h1>Log in Here</h1>
            <p>Please log in your account</p>

            <label for="Email"><b>Phone or Email</b></label>
            <input type="text" placeholder="Phone or Email" name="phemail" required>
            <span style="color:red; font-size:14px"> <?php echo $massage; ?> </span>

            <label for="pass"><b>Password</b></label>
            <input type="password" id="pass" placeholder="Password" name="ppassword" required>
            <span style="color:red; font-size:14px"> <?php echo $massage; ?> </span>

            <button type="submit" class="cancelbtn">Log in</button>

            <div class="pos">
                <a href="forget.php">Forgotten accound?</a>
            </div>
            <p>if You are not ragister member please <a href="Ragisterpage.php">Ragistation Here</a></p>

        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</body>

</html>
