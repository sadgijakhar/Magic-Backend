<?php
include('includes/connect.php');
if($_GET['id']){
    $id = $_GET['id'];
    if(isset($_POST['enter1'])){
        $new = $_POST['password'];
        $confirm = $_POST['confirm_password'];
        // echo"$query  $pass";
        if($new == $confirm){
            $run = "UPDATE `users` SET `password` = '$new' WHERE `id` ='$id'";
            $run1 = mysqli_query($con,$run);
            if($run1){
                header("Location: signin.php");
            }
            
        }
        else{
            
            echo "<script>alert('confirm password not equal to new password')</script>";
            
        }  
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
            <h2>New Password</h2>
            <form method="post">
            <div class="inputbox">
                <input type="text" id ="password" name ="password" required ="required">
                <span>New Password</span>
                <i></i>
            </div>
            <div class="inputbox">
                <input type="text" id ="confirm_password" name ="confirm_password" required ="required">
                <span>Confirm Password</span>
                <i></i>
            </div>
            
            <div class="links">
                
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