<?php
include('../includes/connect.php');
include('../functions/box.php');

session_start();
$id1 = $_GET['id'];

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){

    header("Location: ../signin.php");
    exit();
}

if(isset($_POST['delete_student']))
{
    $student_id = $_POST['delete_student'];
    $ru = "SELECT * from `users` where id = '$student_id'";
    $query_run = mysqli_query($con, $ru);
    $row_data = mysqli_fetch_assoc($query_run);
    $user = $row_data['username'];
    $photo = $row_data['photo'];
    $file_path = "./images/".$photo;

    if (file_exists($file_path)) {
        // Delete the file
        unlink($file_path);
    }

    $sql = "DROP TABLE `$user`";
    mysqli_query($con, $sql);
    
    $query = "DELETE FROM `users` WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);
    $run = "UPDATE `users` SET `id` = `id` - 1 WHERE `id` > $student_id";
    $run1 = mysqli_query($con,$run);
    

    if($query_run)
    {
        $_SESSION['message'] = "Deleted Successfully";
        header("Location: http://localhost/New_Project/skydash-free-bootstrap-admin-template/template/pages/tables/basic-table.php?id=$id1");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Deleted";
        header("Location: http://localhost/New_Project/skydash-free-bootstrap-admin-template/template/pages/tables/basic-table.php?id=$id1");
        exit(0);
        
    }
}

    if(isset($_POST['update'])){
        $student_id = $_POST['_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $name =  $_POST['name'];
        $brief = $_POST['brief'];
        $phone = $_POST['phone'];
        $old =$_POST['username_old'];
        // echo"$username";
        // echo"$old";
        if($username !== $old){
            $sql = "RENAME TABLE $old TO $username";
            mysqli_query($con, $sql);
        }
        // $data = $_POST['data'];
    
      
        if($username=='' or $email=='' or $password=='' or $role=='' or $name=='' or $brief=='' or $phone=='' ){
            echo"<script>alert('Please fill the all avaiable fields')</script>";
            // header("Location: student_create.php");
            exit();
        }
        else{            
            $query = "UPDATE `users` SET `username`='$username',`email`='$email',`password`='$password',`role`='$role' ,`name` = '$name',`phone_no` = $phone , `brief` = '$brief' WHERE id='$student_id'";
            $query_run = mysqli_query($con, $query);
            
            echo"$id1";
            if($query_run)
            {
                $_SESSION['message'] = "Updated Successfully";
                header("Location: http://localhost/New_Project/skydash-free-bootstrap-admin-template/template/pages/tables/basic-table.php?id=$id1");
                exit(0);
            }
            else
            {
                $_SESSION['message'] = "Not Updated";
                header("Location: http://localhost/New_Project/skydash-free-bootstrap-admin-template/template/pages/tables/basic-table.php?id=$id1");
                exit(0);
            }
        }
    }


if(isset($_POST['save']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $name =  $_POST['name'];
    $brief = $_POST['brief'];
    $phone = $_POST['phone'];
    // $data = $_POST['data'];
    $picture_name =$_FILES['product_image1']['name'];
    $tempname =$_FILES['product_image1']['tmp_name'];
    $file_size = $_FILES["product_image1"]["size"]; 
    $file_type = $_FILES["product_image1"]["type"]; 
   
    $picture_name_f = "./images/".$picture_name; // File upload Location   
    $filesizeMax = (1024*900);  
    if($picture_name == ''){
        echo "<script>alert('Please select image to upload')</script>";
    }else if($file_size > $filesizeMax){
      echo "<script>alert('Maximum file upload size in 600KB')</script>";

    }else if (file_exists($picture_name_f)) {
      echo "<script>alert('Sorry, file already exists.')</script>";

    }
    else{
        if (!move_uploaded_file($tempname, $picture_name_f)) { 
           echo "<script>alert('Failed to upload image')</script>";  
        }
        else{
            if($username=='' or $email=='' or $password=='' or $role=='' or $name=='' or $brief=='' or $phone=='' ){
                echo"<script>alert('Please fill the all avaiable fields')</script>";
                header("Location: ../skydash-free-bootstrap-admin-template/template/pages/forms/basic_elements.php?id=$id1");
                exit();
            }
            else{
                $query222= "INSERT INTO `users` (`username`,`email`,`password`,`role`,`name`,`phone_no`,`photo`,`brief`) VALUES ('$username','$email','$password','$role','$name',$phone,'$picture_name','$brief')";
                $query_run23 = mysqli_query($con, $query222);
                // echo "kjekf";
                $count = "SELECT COUNT(*) FROM `users`";
                $coun = mysqli_query($con , $count);
                $row = $coun->fetch_assoc();
                
                $run = "UPDATE `users` SET `id` = ".$row["COUNT(*)"]." WHERE `id` > ".$row["COUNT(*)"];
                $run1 = mysqli_query($con,$run);
                createTable($username);
                
                if($query_run23){
                    $_SESSION['message'] = "Created Successfully";
                    header("Location: http://localhost/New_Project/skydash-free-bootstrap-admin-template/template/pages/tables/basic-table.php?id=$id1");
                    exit(0);
                }
                else{
                    $_SESSION['message'] = "Not Created";
                    header("Location: http://localhost/New_Project/skydash-free-bootstrap-admin-template/template/pages/tables/basic-table.php?id=$id1");
                    exit(0);
                }
            }
        }
        header("Location: http://localhost/New_Project/skydash-free-bootstrap-admin-template/template/pages/tables/basic-table.php?id=$id1");

    }
     
}

?>