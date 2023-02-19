<?php
include('includes/connect.php');
include('../functions/box.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['register'])){
    $query_name = $_POST['name'];
    $query_email = $_POST['email'];
    $query_rollno = $_POST['rollno'];
    $query_mobile_no = $_POST['mobile_no'];
    $query_year = $_POST['year'];
    $query_program = $_POST['program'];
    $query_issue = $_POST['issue'];
    $query_brief = $_POST['brief'];
    $query_status = null;
    
    
    if($query_name=='' or $query_email=='' or $query_rollno=='' or $query_program=='' or $query_mobile_no=='' or $query_issue=='' or $query_brief=='' or $query_year ==''){
        echo"<script>alert('Please fill the all avaiable fields')</script>";
        exit();
    }
    else{
        $insert_query = "insert into `query` (name,email,rollno,mobile_no,year,program,issue,brief,date,assigned) values('$query_name','$query_email','$query_rollno',$query_mobile_no,'$query_year','$query_program','$query_issue','$query_brief',NOW(),'$query_status')";
        $result = mysqli_query($con,$insert_query);
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'setstudentservicecell@sushantuniversity.edu.in';               //SMTP username
            $mail->Password   = 'lyuxliaitntptlgo';                    //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('setstudentservicecell@sushantuniversity.edu.in', 'Magic Cell');
            $mail->addAddress($query_email, $query_name);     //Add a recipient
            $mail->addAddress('setstudentservicecell@sushantuniversity.edu.in');               //Name is optional
            $message = '

            <body style="background-color:white">
                <table align="center" border="0" cellpadding="0" cellspacing="0"
                    width="550" bgcolor="white" style="border:2px solid black">
                    <tbody>
                        <tr>
                            <td align="center">
                                <table align="center" border="0" cellpadding="0"
                                    cellspacing="0" class="col-550" width="550">
                                    <tbody>
                                        <tr>
                                            <td align="center" style="background-color: #4cb96b;
                                                    height: 50px; ">
                                                    MAGIC CELL
                                            </td>
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
                                    <br> Your Query Details
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
            $mail->Body    = '<h1 style="text-align: center";><b>Details Recieved</b><h1>'.$message;
            $mail->AltBody = 'Name: '. $name. 'Email: '.$email;

            $mail->send();
            // echo 'Message has been sent';
        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        if($result){
            echo"<script>alert('Succesfully inserted the Query')</script>";
        }
    }
// } else { echo "<script>alert('invalid email.')</script>";}
    
}
?>
<!DOCTYPE php>
<php lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Magic Cell</title>


    <!--  Bootstrap css file  -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!--  font awesome icons  -->
    <link rel="stylesheet" href="./css/all.min.css">


    <!--  Magnific Popup css file  -->
    <link rel="stylesheet" href="./vendor/Magnific-Popup/dist/magnific-popup.css">


    <!--  Owl-carousel css file  -->
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">

    <!--  style css file  -->
    <link rel="stylesheet" href="./css/style.css">

    <!--  submit css file  -->
    <link rel="stylesheet" href="./css/pages/submit.css">

    <!--  Responsive css file  -->
    <link rel="stylesheet" href="./css/responsive.css">

</head>

<body class ="bg-light">


    <!--  ======================= Start Header Area ============================== -->

    <header class="header_area">
        <div class="main-menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <img src="./img/banner/SU-Logo.jpg" alt="logo">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="http://127.0.0.1:5503/Index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/New_Project/about.php">who are we</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://127.0.0.1:5503/Works.html">our works</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://127.0.0.1:5503/Problems.html#">explore problems</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://127.0.0.1:5503/Process.html">process </a>
                        </li>
                    </ul>
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="submit" href="#">submit issue <span class="sr-only">(current)</a>
                        </li>
                        <li class="nav-item">
                            <a class="submit ml-2" href="signin.php">Login<span class="sr-only">(current)</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!--  ======================= End Header Area ============================== -->

    <!------------------------------------------------------------------------------------------------------------------------------------------------>

    <!--  ========================================================= START FAQ's Heading=========================================================== -->

    <!------------------------------------------------------------------------------------------------------------------------------------------------>


    <div class="form-body">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Submit Your Issue</h3>
                    <p>Fill in the form below.</p>
                    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateMobile()">
                        <div class="part">
                            <h5>For Accounting/Financial Issues</h5>
                            Dear Students,
                            Please keep in mind that for issues related to finances,
                            an additional email will b" that should be sent
                            to us alongside the form. Failure to do so will lead to
                            your case not being taken up by the committee.
                        </div>

                        <div class="part">
                            <h3 class="text-center mt-3">Enter The Details</h3>
                            <div class="col-md-12">
                                <!-- <label for="name" class="form-label m-0">Name</label> -->
                                <input type="text" name="name" id="name" class="form-control m-2" placeholder="Name" required="required">
            
                            </div>
                            <!-- <div class="col-md-12">
                               
                                <input type="text" name="school" id="school" class="form-control m-2" placeholder="School" required="required">
            
                            </div> -->

                            <div class="col-md-12" >
                                <!-- <label for="email" class="form-label m-0">Email</label> -->
                                <input type="email" name="email" id="email" class="form-control m-2" placeholder="Email" required="required" >
            
                            </div>

                            <div class="col-md-12">
                                <!-- <label for="rollno" class="form-label m-0">Roll Number</label> -->
                                <input type="text" name="rollno" id="rollno" class="form-control m-2" placeholder="Roll Number" required="required">
                            </div>

                            <div class="col-md-12">
                                <input type="text" name="mobile_no" id="mobile_no" class="form-control m-2" placeholder="Mobile Number" required="required" required >
                            </div>

                            <div class="col-md-12 ">
                                <!-- <label for="year" class="form-label m-0">Year</label> -->
                                <select class="form-select m-2" name ="year" id="year" required="required">
                                    <option selected disabled value="" >Choose Your Year</option>
                                    <option value="Year 1">Year 1</option>
                                    <option value="Year 2">Year 2</option>
                                    <option value="Year 3">Year 3</option>
                                    <option value="Year 4">Year 4</option>
                                    <option value="Graduated">Graduated</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <!-- <label for="program" class="form-label">Program</label> -->
                                <input type="text" name="program" id="program" class="form-control m-2" placeholder="Program" required="required">
                            </div>
                        </div>

                        <div class="part">
                            <h5>Select The Issue Type</h5>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name ="issue" value="Admissions & Academic Advice" id="issue" >
                                <label class="form-check-label">Admissions & Academic Advice</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name ="issue" id="issue" value="Finance">
                                <label class="form-check-label">Finance</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name ="issue" id="issue" value="Health & Wellness">
                                <label class="form-check-label">Health & Wellness</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name ="issue" id="issue"value="Examinations & University Affairs">
                                <label class="form-check-label">Examinations & University Affairs</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name ="issue" id="issue" value="International Student Support">
                                <label class="form-check-label">International Student Support</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name ="issue" id="issue" value="Hostel/Residency">
                                <label class="form-check-label">Hostel/Residency</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name ="issue" id="issue" value="Academic Support">
                                <label class="form-check-label">Academic Support</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name ="issue" id="issue" value="Career Services">
                                <label class="form-check-label">Career Services</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name ="issue" id="issue" value="Administration & ITES Support">
                                <label class="form-check-label">Administration & ITES Support</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name ="issue" id="issue" value="Accounts">
                                <label class="form-check-label">Accounts</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name ="issue" id="issue" value="Library">
                                <label class="form-check-label">Library</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name ="issue" id="issue" value="Any other Issue">
                                <label class="form-check-label">Any other Issues</label>
                            </div>
                        </div>

                        <div class="col-md-12 part">
                            <h5>State your concern briefly in 50-100 words</h5>
                            <input class="form-control" type="text" name="brief" id="brief" placeholder="Your Concern" required="required">
                        </div>

                        <div class="form-button mt-3">
                            <input type="submit" name="register" id="register"  class="btn btn-success mb-3 px-3" value = "Register">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!------------------------------------------------------------------------------------------------------------------------------------------------>

    <!--  ========================================================= END FAQ's =========================================================== -->

    <!------------------------------------------------------------------------------------------------------------------------------------------------>

    <!------------------------------------------------------------------------------------------------------------------------------------------------>

    <!--  ========================================================= START FOOTERS AREA =========================================================== -->

    <!------------------------------------------------------------------------------------------------------------------------------------------------>


    <footer class="footer">
        <div class="container">
            <div class="">
                <div class="site-logo text-center py-4">
                    <a href="#"><img src="./img/logo-dark.png" alt="logo"></a>
                </div>
                <div class="copyrights text-center">
                    <p class="para">
                        Copyright ©2019 All rights reserved
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>About Sushant University</h4>
                    <p style="color:rgb(184, 184, 184)">
                        Sushant University (Erstwhile Ansal University) was established in 2012 under the Haryana Private Universities Act 2006. Located in the heart of Gurugram, India’s largest hub of National and Fortune 500 companies. We have eight schools offering programmes in Architecture, Design, Law, Management, Hospitality, Engineering, Health Sciences and Planning & Development.
                    </p>
                </div>
                <div class="footer-col">
                    <h4>ADMISSIONS</h4>
                    <ul>
                        <li><a href="https://sushantuniversity.edu.in/education-loan">Education Loans</a></li>
                        <li><a href="https://sushantuniversity.edu.in/payment-procedure">Payment Procedure</a></li>
                        <li><a href="https://sushantuniversity.edu.in/feestructure-refund-policy">Fee Structure and Refund Policy</a></li>
                        <li><a href="https://sushantuniversity.edu.in/academics/online-fee-depositing">Online Fee Depositing</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>EXAMINATION</h4>
                    <ul>
                        <li><a href="https://sushantuniversity.edu.in/academics/examination/rules">Rules</a></li>
                        <li><a href="https://sushantuniversity.edu.in/academics/examination/notice">Notices</a></li>
                        <li><a href="https://sushantuniversity.edu.in/academics/examination/datesheets">Datesheets</a></li>
                        <li><a href="https://sushantuniversity.edu.in/academics/examination/result">Results</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>QUICK LINKS</h4>
                    <div class="social-links">
                        <a href="https://www.facebook.com/SushantUniversity/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/SushantUni"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/sushant.university/"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/school/sushant-university/"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!------------------------------------------------------------------------------------------------------------------------------------------------>

    <!--  ========================================================= END FOOTERS AREA =========================================================== -->

    <!------------------------------------------------------------------------------------------------------------------------------------------------>


    <!-- Bootstrap Script link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        
        function validateMobile() {
            var email = document.getElementById("email").value;
            if (!email.endsWith("@sushantuniversity.edu.in")) {
                alert("Email must end with @sushantuniversity.edu.in");
                document.getElementById("email").value = "";
                return false;
            }
            
            var mobile = document.getElementById("mobile_no").value;
            var pattern = /^\d{10}$/;
            if (!pattern.test(mobile)) {
                alert("Invalid mobile number. Enter 10 digits only");
                document.getElementById("mobile_no").value = "";
                return false;
            }
            return true;
  
        }
    </script>
</body>

</php>