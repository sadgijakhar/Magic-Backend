<?php
include('../includes/connect.php');
include('../functions/box.php');
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

        $query_id = $row_data['id'];
    }
}
if(isset($_POST['submit'])) {
    if(isset($_GET['id'])){
        $data_id = $_GET['id'];
        $insert = "INSERT INTO `solved`(`id`, `name`, `email`, `rollno`, `mobile_no`, `year`, `program`, `issue`, `brief`, `date`) select * from `query` where id = '$data_id'";
        $result = mysqli_query($con,$insert);
        if($result){
            echo"<script>alert('Succesfully inserted')</script>";
        }
        header("Location: solved.php");
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
            viewdetails1();
            ?>
        </div>
        
    </div>
    
</body>
</html>