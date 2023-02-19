<?php

include('includes/connect.php');
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["user"];
    $password = $_POST["pass"];

    $sql ="SELECT * FROM `users` WHERE `username`= '".$username."' AND `password` ='".$password."'";
    $result = mysqli_query($con , $sql);
    $row =mysqli_fetch_array($result);
    $query_id = $row["id"];
    $_SESSION["username"] = $username;
    $_SESSION['role'] = $row["role"];
    
    if($_SESSION['role']=="user"){
        $_SESSION['loggedin'] =true;
        // $_SESSION["username"] = $username;
        header(("Location:./admin/webpage.php?id=$query_id"));
    } 
    else if($_SESSION['role']=="admin"){
        $_SESSION['loggedin'] =true;
        header("Location: http://localhost/New_Project/admin/index.php?id=$query_id");
    }
    else{
        $_SESSION['loggedin'] =false;
        echo "<script> alert('username or password incorrect')</script>";
    }
}

?>
<!DOCTYPE php>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="sign.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="box">
        <div class="form">
            <h2>Log in</h2>
            <form method="post">
            <div class="inputbox">
                <input type="text" id ="user" name ="user" required ="required">
                <span>user name</span>
                <i></i>
            </div>
            <div class="inputbox">
                <input type="password" id ="pass" name ="pass" required ="required">
                <span>Password</span>
                <i></i>
            </div>
            <div class="links">
                <a href ="forgot.php">Forgot Password</a>
            </div>
            <input type="submit" name="enter" id="enter" value="Login">
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
</php>