<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/logstyle.css"media="all">
    <title>admin login</title>
  </head>
  <body>
<div class="login-page">
  <div class="form">
    <h2 style="color: white;text-align:center;"><?php echo @$_GET['not_admin']; ?></h2>
    <h2 style="color: white;text-align:center;"><?php echo @$_GET['logged_out']; ?></h2>
    <h2>Admin login</h2>
    <form class="login-form"action="logina_admin.php"method="POST"enctype="multipart/form-data">
      <input type="text"name="email" placeholder="useremail"required/>
      <input type="password"name="pass" placeholder="password" />
      <button type="submit" name="login">login</button>
    </form>
  </div>
</div>

  </body>
</html>




<?php

include("include/db.php");
if(isset($_POST['login'])){
 $email =$_POST['email'];
 $pass = $_POST['pass'];

 $sel_user = "SELECT * FROM admin Where user_email='$email'AND usar_pass='$pass'";
 $run_user = mysqli_query($database_connection, $sel_user);
 $check_user = mysqli_num_rows($run_user);
 if($check_user==1){
   $_SESSION['user_email'] =$email;
     echo "<script>window.open('admin.php?logged_in=you have succesfully login','_self')</script>";
 }
else{
   echo "<script>alert('Password or email is Worng try again!')</script>";
}
}


  ?>
