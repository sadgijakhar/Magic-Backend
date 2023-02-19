<?php
session_start();
include('../includes/connect.php');
session_start();
$id = $_GET['id'];
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){

    header("Location: ../signin.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student Create</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create a new member 
                            <?php echo" <a href='fetch.php?id=$id' class='btn btn-danger float-end'>BACK</a>" ?>
                        </h4>
                    </div>
                    <div class="card-body w-70">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3 w-70">
                                <!-- <label>Name</label> -->
                                <input type="text" name="name" class="form-control" placeholder="Name" required="required">
                            </div>
                            <div class="mb-3">
                                <!-- <label>User Name</label> -->
                                <input type="text" name="username" class="form-control" placeholder="User Name" required="required">
                            </div>
                            <div class="mb-3">
                                <!-- <label>Email</label> -->
                                <input type="email" name="email" class="form-control" placeholder="Email" required="required">
                            </div>
                            <div class="mb-4 w-70 m-auto">
                                <!-- <label>Phone No.</label> -->
                                <input type="text" name="phone" class="form-control" placeholder="Phone no." required="required">
                            </div>
                            <div class="form-outline mb-4 w-70 m-auto">
                                <label for="product_image1" class="form-label">Product Image 1</label>
                                <input type="file" name="product_image1"  accept=".png,.gif,.jpg,.webp" id="product_image1" class="form-control" placeholder="Product Image 1" required="required">
                            </div>
                            <div class="mb-4 w-70 m-auto">
                                <!-- <label class="mb-2 font-weight-bold">Image</label> -->
                                <input type="text" name="brief" class="form-control" placeholder="Introduce Yourself in 2-3 Lines" required="required">
                            </div>

                            <div class="mb-4 w-70 m-auto">
                                <!-- <label>Password</label> -->
                                <input type="text" name="password" class="form-control" placeholder="Create your Password" required="required">
                            </div>
                            
                            
                            <div class="mb-4 w-70 m-auto">
                                <!-- <label>Role</label> -->
                                
                                <!-- <label for="year" class="form-label m-0">Year</label> -->
                                <select class="form-select" name ="role" id="role" required="required">
                                    <option selected disabled value="" >Role</option>
                                    <option value="admin">admin</option>
                                    <option value="user">user</option>
                                    
                                </select>
                            
                                <!-- <input type="text" name="role" class="form-control" placeholder="Role" required="required"> -->
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save" class="btn btn-primary">Save Data</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>