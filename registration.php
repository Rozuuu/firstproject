<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = 'email'");
    if(mysqli_num_rows($duplicate)> 0){
        echo
        "<script> alert('Username or Email Has Already Taken Chuy!!') </script>";
    }
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn,$query);
            echo
            "<script> alert('Registration Successful Choii') </script>";
        }
        else{
            echo
            "<script> alert('Password Does Not Match') </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title >Registration</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="registration.css">
    <link rel="icon" type="image/x-icon" href="r.png">
    
        <style>
   
   
        </style>
        <body>
        <div class="container">
        <form class="form" action="" method="post" autocomplete="off">
        
        <p class="form-title">Register your account  </p>
        <div class="input-container">
            <!--Nickname-->
            <label for="name">
            <input class="input" type="text" name="name" id="name" placeholder="Nickname" class="input-container" required value="">  </label>
            
            <!--Username-->
            <label for="username">
            <input class="input" type="text" name="username" id="username" placeholder="Username" class="input-container" required value=""> </label>
            <!--Email-->
            <label for="email"><input class="input" type="text" name="email" id="email" placeholder="Email" required value=""> </label>
            
            <!--Password-->
            <label for="password">
            <input class="input" type="password" name="password" id="password" placeholder="Password" class="input-container" required value=""> </label>
            
            <!--Repeat-Password-->
            <label for="confirmpassword">
            <input class="input" type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" class="input-container" required value=""> </label>
           
            <button class="submit" type="submit" name="submit"><span>Submit</span></button>
            <p class="signup-link">Already have an acount? <a href="login.php">Login</a> </p>
        </div></form>
        </div>
    </body>
</html>
