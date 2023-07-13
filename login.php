<?php
    require 'config.php';
    if(!empty($_SESSION["id"])){
        header("Location: index.php");
    }
    if(isset($_POST["submit"])){
        $usernameemail = $_POST["usernameemail"];
        $password = $_POST["password"];
        $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0){
            if($password == $row["password"]){
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                header("Location: index.php");
            }
            else{
                echo
                "<script> alert('Wrong Password Chuyy') </script>";
            }
        }
        else{
            echo
            "<script> alert('Dli mani naregistered chuy') </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700;900&display=swap" rel="stylesheet">
      <link href="login.css" rel="stylesheet" >
      <link rel="icon" type="image/x-icon" href="r.png">
       
        <title>Login</title>
    <body>
        <div class="container">
        
        <form class="form" action="" method="post" autocomplete="off">
        <p class="form-title">Log in to your account</p>
            <div class="input-container">
            <label for="usernameemail" ></label>
            <input type="text" name="usernameemail" id="usernameemail" placeholder="Enter username or email" required value="" class="input-container"><br>
            </div><div class="input-container">
            <label for="password" ></label>
            <input type="password" name="password" id="password" placeholder="Enter password" required value=""><br>
            <button class="submit" type="submit" name="submit"><span>Login</span></button>

            </div>
            
        <br>
        <p class="signup-link"> No account?
        <a  href="registration.php">Register</a></p>
        </form>
        </div>
    </body>
</html