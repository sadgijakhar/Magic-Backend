<?php
    session_start();
    include('../includes/connect.php');
    $id = $_GET['id'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student CRUD</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header m-4 p-2">
                        <h4>Members Details
                        <?php echo "
                            <a href='student_create.php?id=$id' class='btn btn-primary m-2 p-2 float-end'>Add Member</a>
                            <a href='index.php?id=$id' class='btn btn-danger  m-2 p-2 float-end'>Home</a>"
                            ?>
                        </h4>
                        
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM `users`";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
                                                
                                                <td><?= $student['username']; ?></td>
                                                <td><?= $student['name']; ?></td>
                                                <td><?= $student['email']; ?></td>
                                                <td><?= $student['role']; ?></td>

                                                <td>
                                                    <a href="student_view.php?id1=<?=$id?>&id=<?= $student['id']; ?>" class="btn btn-info btn-sm m-1">View</a>
                                                    <a href="student_edit.php?id1=<?=$id?>&id=<?= $student['id']; ?>" class="btn btn-success btn-sm m-1">Edit</a>
                                                    <?php echo"<form action='code.php?id=$id' method='POST' class='d-inline'>" ?>
                                                        <button type="submit" name="delete_student" value="<?=$student['id'];?>" class="btn btn-danger btn-sm" m-1>Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>