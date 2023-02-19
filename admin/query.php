<?php
include('../includes/connect.php');
include('../functions/box.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
$query_id=null;
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){

    header("Location: ../signin.php");
    exit();
}
if(isset($_GET['id'])){
    $select_query = "Select * from `query`";
    $result_query = mysqli_query($con, $select_query);
    while($row_data = mysqli_fetch_assoc($result_query)){
        // $query_id = $row_data['id'];
        $query_id = $row_data['id'];
            $query_name = $row_data['name'];
            $query_email = $row_data['email'];
            $query_rollno = $row_data['rollno'];
            $query_mobile_no = $row_data['mobile_no'];
            $query_year = $row_data['year'];
            $query_program = $row_data['program'];
            $query_issue = $row_data['issue'];            
            $query_date = $row_data['date'];
            $query_brief = $row_data['brief'];
    }
}
if(isset($_POST['register'])) {
    if(isset($_GET['id'])){
        $data_id = $_GET['id'];
        $assigned = $_POST['year'];
        // echo "$assigned";
        $insert_assigned = "UPDATE `query` SET `assigned` = '$assigned' WHERE id = '$data_id'";
        $result = mysqli_query($con,$insert_assigned);
        // echo "$assigned";
        $run = "SELECT * from `users` where `name` = '$assigned'";
        $result = mysqli_query($con, $run);
        $row =mysqli_fetch_array($result);
        // echo "$assigned";
        $email = $row['email'];
        $name = $row['name'];
        $username = $row['username'];
        $insert = "INSERT INTO `$username` (`id`,`name`, `email`, `rollno`, `mobile_no`, `year`, `program`, `issue`, `brief`, `date`) SELECT `id`,`name`, `email`, `rollno`, `mobile_no`, `year`, `program`, `issue`, `brief`, `date` FROM `query` WHERE `id` = '$data_id'";
        $result = mysqli_query($con,$insert);
        try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'setstudentservicecell@sushantuniversity.edu.in';               //SMTP username
        $mail->Password   = 'lyuxliaitntptlgo';                     //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('setstudentservicecell@sushantuniversity.edu.in', 'Magic Cell');
        $mail->addAddress('setstudentservicecell@sushantuniversity.edu.in');     //Add a recipient
        $mail->addAddress($email, $name);               //Name is optional
        $message = '
    
        <body style="background-color:grey">
        <table align="center" border="0" cellpadding="0" cellspacing="0"
        width="550" bgcolor="white" style="border:2px solid black">
        <tbody>
        <tr>
            <td align="center">
                <table align="center" border="0" cellpadding="0" cellspacing="0" class="col-550" width="550">
        <tbody>
        <tr>
            <td align="center" style="background-color: #4cb96b;height: 50px; ">MAGIC CELL</td>
        </tr>
        </tbody>
        </table>
                                </td>
                            </tr>
                            <tr style="height: 300px;">
                                <td align="center" style="border: none;
                                        border-bottom: 2px solid #4cb96b;
                                        padding-right: 20px;padding-left:20px">
                
                                    <p style="font-weight: bolder;font-size: 42px;
                                            letter-spacing: 0.025em;
                                            color:black;">
                                        <br> New Task Assigned to you
                                    </p>
                                </td>
                            </tr>
                
                            <tr style="display: inline-block;">
                                <td style="height: 150px;
                                        padding: 20px;
                                        border: none;
                                        border-bottom: 2px solid #361B0E;
                                        background-color: white;">
                                    
                                    <h2 style="text-align: left; align-items: center;">
                                        Name : '.$query_name.'
                                    </h2>
                                    <h2 style="text-align: left; align-items: center;">
                                        Email : '.$query_email.'
                                    </h2>
                                    <h2 style="text-align: left; align-items: center;">
                                        Roll No. : '.$query_rollno.'
                                    </h2>
                                    <h2 style="text-align: left; align-items: center;">
                                        Mobile No. : '.$query_mobile_no.'
                                    </h2>
                                    <h2 style="text-align: left; align-items: center;">
                                        Year : '.$query_year.'
                                    </h2>
                                    <h2 style="text-align: left; align-items: center;">
                                        Program : '.$query_program.'
                                    </h2>
                                    <h2 style="text-align: left; align-items: center;">
                                        Issue Type : '.$query_issue.'
                                    </h2>
                                    <h2 style="text-align: left; align-items: center;">
                                        Description : '.$query_brief.'
                                    </h2>
    
                                </td>
                            </tr>
                            <tr style="border: none;
                                background-color: #4cb96b;
                                height: 40px;
                                color:white;
                                padding-bottom: 20px;
                                text-align: center;">
                            </tr>
                
                        </tbody>
                    </table>
                </body>'
                ;
    
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Here is the subject';
                $mail->Body    = '<h1><b>Details Recieved</b><h1>'.$message;
                $mail->AltBody = 'Name: '. $name. 'Email: '.$email;
    
                $mail->send();
                // echo 'Message has been sent';
            }
            catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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
    <title>Query</title>
    <!-- Bootstrap CSS LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../admin/index.css">
    <!-- FONT AWESOME LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Magic</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href='index.php'>Home</a>
            </li>
        
            <li class="nav-item"><?php
            echo "
            <a class='nav-link active' aria-current='page' href='allqueries.php?id=$query_id'>Unsolved Queries</a>
            </li>
            <li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='solved.php'>Solved Queries</a></li>
            <li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='dr.bindumain.php?id=$query_id'>Dr. Bindu Thakral</a></li>
            <li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='kshitijmain.php?id=$query_id'>Mr. Kshitij Gupta</a></li>
            <li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='sadgimain.php?id=$query_id'>Sadgi Jakhar</a></li>
            "?>
        </ul>
        </div>
    </div>
    </nav>
    <div class="row m-4 mt-4 ">
        
        <div class="col-md-12">
            <!-- Query -->
            <?php
            viewdetails();
            delete_1();
            ?>
        </div>
        
    </div>
    
</body>
</html>