<?php
include('../includes/connect.php');
include('../functions/box.php');
$query_data = null;
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){

    header("Location: ../signin.php");
    exit();
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $select = "Select * from `users` where id = '$id'";
    $result = mysqli_query($con, $select);
    $row= mysqli_fetch_assoc($result);
    $name = $row['name'];
    $select_query = "Select * from `query`";
    $result_query = mysqli_query($con, $select_query);
    while($row_data = mysqli_fetch_assoc($result_query)){

        $query_id = $row_data['id'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../admin/index.css">
    <!-- FONT AWESOME LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            width: 100%;
            background-image: url(img.jpeg);
            height:auto;
        }
        .text{
            
            position: absolute;
            left:55%;
            top:55%;
        }
        .text h1{
            font-size: 100px;
        }
        .text p{
            font-size: 30px;
            margin-right: 12%;
        }
    </style>
</head>
<body>
    
    <div class="row">
        <div style="text-align: center;" class="col-3 m-5 p-5 bg-secondary">
        <?php
            echo "<a class='nav-link text-white' style='font-size: 1.5em;' aria-current='page' href='index.php?id=$id'>Home</a>"
        ?>
            
        </div> 
        <div style="text-align: center;" class="col-3 m-5 p-5 bg-primary">
            <?php
            echo "<a class='nav-link text-white' style='font-size: 1.5em;' aria-current='page' href='allqueries.php?id=$id'>Unsolved Queries</a>"
            ?>
        </div>
        <div style="text-align: center;" class="col-3 m-5 p-5 bg-success">
            <?php
            echo "<a class='nav-link text-white' style='font-size: 1.5em;' aria-current='page' href='solved.php?id=$id'>Solved Queries</a>"
            ?>
        </div>
        <div style="text-align: center;" class="col-3 m-5 p-5 bg-danger">
            <?php
            echo "<a class='nav-link text-white' style='font-size: 1.5em;' aria-current='page' href='webpage.php?id=$id'>$name</a>"
            ?>
        </div>
        <div style="text-align: center;" class="btn col-3 m-5 p-5 bg-dark">
            <form method="post" action="export.php" align="center">  
                <input type="submit" name="export" value="Unsolved Queries" class="btn text-white" style='font-size: 1.5em;' />  
            </form> 
        </div>
        <div style="text-align: center;" class="btn col-3 m-5 p-5 bg-warning">
            <form method="post" action="export.php" align="center">  
                <input type="submit" name="solved" value="Solved Queries" class="btn text-white" style='font-size: 1.5em;' />  
            </form> 
        </div>
        
        <div style="text-align: center;" class="col-3 m-5 p-5 bg-info">
            <?php
            echo "<a class='nav-link text-white' style='font-size: 1.5em;' aria-current='page' href='fetch.php?id=$id'>Member Details</a>"
            ?>
        </div>
    </div>
    <div style="text-align: center;" class="col-3 m-5 p-5 bg-danger">
            <?php
            echo "<a class='nav-link text-white' style='font-size: 1.5em;' aria-current='page' href='../logout.php'>Logout</a>"
            ?>
    </div>

    <div class="text">
        <h1>MAGIC CELL</h1>
        <p>Together we can change the world, just one random act of kindness at a time.</p>
    </div>

</body>
</html>