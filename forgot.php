<?php
include('includes/connect.php');
include('../functions/box.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['enter1'])){
    $query_email = $_POST['email'];
    // echo"$query_email";
    if($query_email==''){
        echo"<script>alert('Please fill the all avaiable fields')</script>";
        exit();
    }
    else{
        $otp = rand(100000000,999999999);
        $run = "UPDATE `users` SET `password` = '$otp' WHERE `email` ='$query_email'";
        $run1 = mysqli_query($con,$run);
        // echo"$query_email";
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'setstudentservicecell@sushantuniversity.edu.in';               //SMTP username
            $mail->Password   = 'lyuxliaitntptlgo';                      //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('setstudentservicecell@sushantuniversity.edu.in', 'Magic Cell');
            $mail->addAddress($query_email);     //Add a recipient
            // $mail->addAddress('sadgijakhar3@gmail.com');               //Name is optional
            // $message = '';

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = '<h1 style="text-align: center";><b>Reset Password OTP</b><h1>'.$otp;
            $mail->AltBody = 'Name: '. $name. 'Email: '.$email;

            $mail->send();
            // echo 'Message has been sent';
        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        if($result){
            echo"<script>alert('Succesfully send the request')</script>";
        }
    }
    header("Location: resetpassword.php");
// } else { echo "<script>alert('invalid email.')</script>";}
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="sign.css">
</head>
<body>
<div class="box">
        <div class="form">
            <h2>Forgot Password</h2>
            <form method="post">
            <div class="inputbox">
                <input type="email" id ="email" name ="email" required ="required">
                <span>Email</span>
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