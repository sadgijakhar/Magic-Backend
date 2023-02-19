<?php
include('../includes/connect.php');
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){

    header("Location: ../signin.php");
    exit();
}
$id1 = $_GET['id1'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="index.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student View Details 
                            <a href="fetch.php?id=<?=$id1?>" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM `users` WHERE id='$student_id' ";
                            $query_run = mysqli_query($con, $query);


                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <form enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label>User Name</label>
                                        <p class="form-control">
                                            <?=$student['username'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Name</label>
                                        <p class="form-control">
                                            <?=$student['name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <p class="form-control">
                                            <?=$student['email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Phone no.</label>
                                        <p class="form-control">
                                            <?=$student['phone_no'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                    <label>Image</label>
                                        <p class='form-control'>
                                            <img src='images/<?=$student['photo'];?>' width="150" height="200">
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Brief</label>
                                        <p class="form-control">
                                            <?=$student['brief'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>password</label>
                                        <p class="form-control">
                                            <?=$student['password'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Role</label>
                                        <p class="form-control">
                                            <?=$student['role'];?>
                                        </p>
                                    </div>
                                    
                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>


