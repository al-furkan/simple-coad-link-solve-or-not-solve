<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honesty Shoping</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="ragister.css">
</head>

<body>
    <img src="img/login.png" alt="ALL"height="120" width="1320" >
    <div class="reg">


      <?php

                  $errname = $errphone = $erremail =  $errpass = $errrepass = $errpic = $erraddress =  "";

                  if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    if(empty($_POST['name'])){
                      $errname = "your name field is required";
                    }
                    elseif(empty($_POST['phone'])){
                      $errphone = "your phone number field is required";
                    }
                    elseif(empty($_POST['email'])){
                      $erremail = "your email field is required";
                    }
                    elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                      $erremail = "please enter your valid email address!";
                    }
                    elseif(empty($_POST['password'])){
                      $errpass = "your password field is required";
                    }
                    elseif(empty($_POST['password']==$_POST['psw-repeat'])){
                      $errrepass = "your password field is not same";
                    }
                    elseif(empty($_FILES["picture"]["name"])){
                      $errpic = "your picture field is required";
                    }
                    elseif(empty($_POST['address'])){
                      $erraddress = "your address field is required";
                    }
                    else{

                      include('include/db.php');


                      $user_name = $_POST['name'];
                      $user_phone = $_POST['phone'];
                      $user_email = $_POST['email'];
                      $user_password = md5($_POST['password']);
                      $user_psw_repeat = $_POST['psw-repeat'];

                      $user_picture = rand(1000,10000)."-".$_FILES["picture"]["name"];
                       $imgs =$_FILES['picture']['tmp_name'];


                      $user_address = $_POST['address'];
                      // require_once'phpfile/mysqlconnect.php';
                      $coutemail = mysqli_query($database_connection,"SELECT * FROM reginfo WHERE  email='$user_email'");

                      $cuntemal= mysqli_num_rows($coutemail);

                      if($cuntemal==0){

                       move_uploaded_file($imgs,"uplodeimg/".$user_picture);
                        $insert_query = "INSERT INTO reginfo(fullname, phonenum, email, password, picture, Address)
                         VALUES ('$user_name','$user_phone','$user_email','$user_password','$user_picture','$user_address')";

                                               if(mysqli_query($database_connection, $insert_query)){
                                                 echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                  <strong> Your registration is successfull! please Log in </strong>
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>';}

                  }
                  elseif ($cuntemal<=1) {
                    echo  '<span style="color:red; font-size:16px; text-align: center;display:block;"> Your emali already used please use new email Or Log in</span>"';
                  }
                }
              }
                 ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>"method="POST"enctype="multipart/form-data">
            <h2>Ragistation Form</h2>
            <p>Please fill in this form to create an account.</p>

            <label for="name"><b>Full name</b></label>
            <input id="name" type="text" placeholder="Enter Your Name" name="name">
            <span style="color:red; font-size:14px"> <?php echo $errname; ?> </span>

            <label for="Phone number"><b>Phone Number</b></label>
            <input type="text" placeholder="Enter Phone number" name="phone">
            <span style="color:red; font-size:14px"> <?php echo $errphone; ?> </span>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email">
            <span style="color:red; font-size:14px"> <?php echo $erremail; ?> </span>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password">
            <span style="color:red; font-size:14px"> <?php echo $errpass; ?> </span>

            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat">
            <span style="color:red; font-size:14px"> <?php echo $errrepass; ?> </span>

            <div class="mb-3">
                <label for="formFile" class="form-label">Your picture</label>
                <input class="form-control" type="file" id="formFile" name="picture">
                <span style="color:red; font-size:14px"> <?php echo $errpic; ?> </span>
            </div>

            <label for="address"><b>Addres</b></label>
            <textarea class="form-control" id="address" rows="1" name="address"></textarea>
            <span style="color:red; font-size:14px"> <?php echo $erraddress; ?> </span>

            <button type="submit" class="cancelbtn">Ragister</button>
            <p>if You are ragister member please <a href="login.php">Log in</a></p>
        </form>
    </div>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</body>

</html>
