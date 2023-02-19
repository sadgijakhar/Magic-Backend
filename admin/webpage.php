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
    $select_query = "Select * from `users` where id = $id";
    $result_query = mysqli_query($con, $select_query);
    while($row_data = mysqli_fetch_assoc($result_query)){
        $username = $row_data['username'];
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
    <div class="row m-4 mt-4 ">
    
        <?php
            getdatabox1($username , $id);
            delete2($username);
        ?>
        
    </div>

</body>
</html>