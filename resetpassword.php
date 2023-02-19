<?php
include('includes/connect.php');

if(isset($_POST['enter1'])){
    $query = $_POST['email'];
    $pass = $_POST['pass'];
    // echo"$query  $pass";
    $run = "SELECT * FROM `users` WHERE email = '$query'";
    $run1 = mysqli_query($con,$run);
    // echo"$query  $pass";
    
        $row = mysqli_fetch_array($run1);
        $id = $row['id'];
        $password = $row['password'];
        echo"$query  $pass";
        if($password==$pass){
            header("Location: newpassword.php?id=$id");
        }
        else{
            echo "<script>alert('OTP not match')</script>";
        }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Password</title>
    <link rel="stylesheet" href="sign.css">
</head>
<body>

<div class="box">
        <div class="form">
            <h2>Forgot Password</h2>
            <form method="post">
            <div class="inputbox">
                <input type="email" id ="email" name ="email" value='<?php $query_email ?>'required ="required">
                <span>Email</span>
                <i></i>
            </div>
            <div class="inputbox">
                <input type="password" id ="pass" name ="pass" required ="required">
                <span>Enter OTP</span>
                <i></i>
            </div>
            
            <div class="links">
                <a href ="signin.php">Login</a>
            </div>
            
            <input type="submit" name="enter1" id="enter1" value="Send">
            </form>
        </div>
    </div>
    <div class="image">
        <ul>
            <li> <img src="img/logo.png">
            </li>
        </ul> 
     </div> 
</body>
</html>