<?php
include('includes/connect.php');
include('functions/box.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <!--  Bootstrap css file  -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--  font awesome icons  -->
    <link rel="stylesheet" href="css/all.min.css">
    <!--  Magnific Popup css file  -->
    <link rel="stylesheet" href="vendor/Magnific-Popup/dist/magnific-popup.css">
    <!--  Owl-carousel css file  -->
    <link rel="stylesheet" href="vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/owl-carousel/css/owl.theme.default.min.css">
    <!--  about css file  -->
    <link rel="stylesheet" href="about.css" type="text/css">
    <!--  style css file  -->
    <link rel="stylesheet" href="css/style.css">    
    <!--  Responsive css file  -->
    <link rel="stylesheet" href="css/responsive.css">

</head>
<body>
<header class="header_area">
        <div class="main-menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <img src="img/banner/SU-Logo.jpg" alt="logo">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="/Index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">who are we <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Works.html">our works</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Problems.html">explore problems</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Process.html">process </a>
                        </li>
                    </ul>
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="submit" href="http://localhost/New_Project/submit.php">submit issue</a>
                            <a class="submit" href="http://localhost/New_Project/signin.php">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!--  ======================= End Header Area ============================== -->

    <!------------------------------------------------------------------------------------------------------------------------------------------------>

    <!--  ========================================================= START ABOUT =========================================================== -->

    <!------------------------------------------------------------------------------------------------------------------------------------------------>


    <!-- WELCOME -->
    <section class="about-start">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">

                    <!-- Heading -->
                    <h1 class="display-1 fw-bold">
                        ABOUT US
                    </h1>
                </div>
            </div>
        </div>
    </section>


    <!-- SUPPORT -->
    <section class="about-area">

        <div>
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-12 col-md-6 col-lg-5">

                        <!-- Badge -->
                        <span>
                            <span class="title-badge">ABOUT US</span>
                        </span>

                        <!-- Heading -->
                        <h2>
                            <div class="how_we_work">
                                WHO ARE WE? <br>
                            </div>
                        </h2>
                        

                        <!-- Text -->
                        <p class="fs-lg text-gray-700 mb-6">
                            We are a small team pushing the boundaries of what's possible so that
                            you do not have to worry about anything.<br>
                        </p>

                    </div>

                    <div class="col-12 col-md-6">

                        <!-- Images -->
                        <div class="row">
                            <div class="col-12 mt-8 me-n5" data-aos="fade-up" id="landing-image-2">
                                <img src="img/About/Banner-1.jpg" alt="..." class="img-fluid mb-4 rounded">
                            </div>
                        </div> 
                    </div>
                </div> 
            </div> 
        </div>

    </section>

    <section class="meet-the-team-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center meet-the-team-title">
                    <h1 class="text-uppercase title-text">Meet the team</h1>
                    <p class="para">
                        We are a small team pushing the boundaries of what's possible so that
                        you do not have to worry about anything.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="about-area">
        <?php
        getproducts();
        ?>
        
        
    </section>





    <!------------------------------------------------------------------------------------------------------------------------------------------------>

    <!--  ========================================================= END ABOUT =========================================================== -->

    <!------------------------------------------------------------------------------------------------------------------------------------------------>


    <!------------------------------------------------------------------------------------------------------------------------------------------------>

    <!--  ========================================================= START FOOTERS AREA =========================================================== -->

    <!------------------------------------------------------------------------------------------------------------------------------------------------>


    <footer class="footer mt-4">
        <div class="container">
            <div class="">
                <div class="site-logo text-center py-4">
                    <a href="#"><img src="img/logo-dark.png" alt="logo"></a>
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




    <!--  Jquery js file  -->
    <script src="js/jquery.3.4.1.js"></script>

    <!--  Bootstrap js file  -->
    <script src="js/bootstrap.min.js"></script>

    <!--  isotope js library  -->
    <script src="vendor/isotope/isotope.min.js"></script>

    <!--  Magnific popup script file  -->
    <script src="vendor/Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>

    <!--  Owl-carousel js file  -->
    <script src="vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!--  custom js file  -->
    <script src="js/main.js"></script>


    
</body>
</html>