<?php
include('./includes/connect.php');

//About Page
function getproducts(){
    global $con;

    
        $select_product = "Select * from `users` ";
        $result_product = mysqli_query($con, $select_product);
        while($row_data = mysqli_fetch_assoc($result_product)){
        
        $id = $row_data['id'];
        $name = $row_data['name'];
        $brief = $row_data['brief'];
        $image = $row_data['photo'];
        $num =0;
        if( $id == 1 or $id%4 ==1){
            $num =1;
            echo "<div class='about-section-$num'>
                    <div class='inner-container-$num'>
                        <img src='admin/images/$image' height='250' width='250' alt='...' class='hello img-fluid mb-4 rounded'>
                        <h1>$name</h1>
                        <p class='text-$num'>
                            $brief
                        </p>
                        
                    </div>
                </div>";
        }
        else if( $id == 2 or $id%4==2){
            $num =2;
            echo "<div class='about-section-$num'>
                    <div class='inner-container-$num'>
                        <img src='admin/images/$image' height='250' width='250' alt='...' class='hello img-fluid mb-4 rounded'>
                        <h1>$name</h1>
                        <p class='text-$num'>
                            $brief
                        </p>
                        
                    </div>
                </div>";
        }
        else if( $id == 3 or $id%4==3){
            $num =3;
            echo "<div class='about-section-$num'>
                    <div class='inner-container-$num'>
                        <img src='admin/images/$image' height='250' width='250' alt='...' class='hello img-fluid mb-4 rounded'>
                        <h1>$name</h1>
                        <p class='text-$num'>
                            $brief
                        </p>
                        
                    </div>
                </div>";
        }
        else if( $id%4==0){
            $num =2;
            echo "<div class='about-section-$num'>
                    <div class='inner-container-$num'>
                        <img src='admin/images/$image' height='250' width='250' alt='...' class='hello img-fluid mb-4 rounded'>
                        <h1>$name</h1>
                        <p class='text-$num'>
                            $brief
                        </p>
                        
                    </div>
                </div>";
        }
    
    }
}

// -----------------Create a new Table---------------

function createTable($tableName) {
    global $con;
  
    // SQL statement to create a new table            
    $sql = "CREATE TABLE $tableName (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    rollno VARCHAR(50) NOT NULL,
    mobile_no BIGINT(10) NOT NULL,
    year VARCHAR(10) NOT NULL,
    program VARCHAR(50) NOT NULL,
    issue VARCHAR(50) NOT NULL,
    brief VARCHAR(500) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
  
    if ($con->query($sql) === TRUE) {
      echo "Table $tableName created successfully";
    } else {
      echo "Error creating table: " . $con->error;
    }
  
    $con->close();
  }

// -----------------All Quieris------------
function getdatabox(){
    global $con;
    if(isset($_GET['id'])){
    $select_query = "Select * from `query`";
    $result_query = mysqli_query($con, $select_query);
    while($row_data = mysqli_fetch_assoc($result_query)){

        $query_id = $row_data['id'];
        $query_name = $row_data['name'];
        $query_email = $row_data['email'];
        $query_rollno = $row_data['rollno'];
        $query_mobile_no = $row_data['mobile_no'];
        $query_year = $row_data['year'];
        $query_program = $row_data['program'];
        echo "<div class='col-md-6'>
        <div class='card text-center'>
            <div class='card-header'>
                <ul class='nav nav-pills card-header-pills'>
                <li class='nav-item'>
                <a class='nav-link active' href='allqueries.php?id=$query_id'>Info</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='query.php?id=$query_id'>Query</a>
                </li>
                </ul>
            </div>
            <div class='card-body'>
                <h5 class='cah1'> Name : $query_name</h5>
                <h5 class='cah1'>Email : $query_email</h5>
                <h5 class='cah1'>Roll No. : $query_rollno</h5>
                <h5 class='cah1'>Mobile Number : $query_mobile_no</h5>
                <h5 class='cah1'>Year : $query_year</h5>
                <h5 class='cah2'>Program: $query_program</h5> 
                     </div>    
            </div>
    </div>";
    }
}
}
function delete_1(){
    global $con;
    $delete = "Delete from `query` WHERE (query.id) in (select solved.id from `solved`)";
    $result = mysqli_query($con, $delete);
    header("Location: allqueries.php");
}

function viewdetails(){
    global $con;
    if(isset($_GET['id'])){
        $dataid = $_GET['id'];
        $select_query = "Select * from `query` where id = $dataid";
        $result_query = mysqli_query($con, $select_query);
        while($row_data = mysqli_fetch_assoc($result_query)){

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
            $query_assigned = $row_data['assigned'];

            if($query_assigned ==''){
            echo "
            <div class='card text-center'>
                <div class='card-header'>
                    <ul class='nav nav-pills card-header-pills'>
                    <li class='nav-item'>
                    <a class='nav-link' href='allqueries.php?id=$query_id'>Info</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link active' href='query.php?id=$query_id'>Query</a>
                    </li>
                    </ul>
                </div>
                <div class='card-body'>
                <div class='container text-left'>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Name</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_name</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Email</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0' text-align-left>
                            <h6 class='cah1'>$query_email</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Roll No.</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_rollno</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Mobile No.</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_mobile_no</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Year</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_year</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Program</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_program</h6>
                        </div>
                    </div>
                    
                    <div class='row justify-content-start mb-2 text-align-left'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Issue Type</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_issue</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Date - Time</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_date</h6>
                        </div>
                    </div>

                    <div class='row justify-content-flex-start mb-2 '>
                        <div class='col-4'>
                            <h5 class='cah1'><strong>Description</strong></h5>
                        </div>
                        <div class='col-md-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_brief</h6>
                        </div>
                    </div>
                    <div class='row justify-content-flex-start mb-2 '>
                        <div class='col-4'>
                            <h5 class='cah1'><strong>Assigned To</strong></h5>
                        </div>
                        <div class='col-md-3 text-align-left p-0'>
                        
                            <form action='' method='post' enctype=multipart/form-data'>
                            <div class='col-md-12'>
                                <select name ='year' id='year' class='form-select' required='required'>
                                <option selected disabled value=''>Assigned</option>
                                ";
                                $select_category = 'Select * from `users`';
                                $result_category = mysqli_query($con,$select_category);
                                while($row_data = mysqli_fetch_assoc($result_category)){
                                    $category_name = $row_data['name'];
                                    // $category_id = $row_data['id'];
                                echo"
                                <option value='$category_name'>$category_name</option>";
                                }
                                
                                echo "</select> 
                                <div class='form-button mt-3'>
                                    <input type='submit' name='register' id='register' class='btn btn-success mb-3 px-3' value = 'Assigned'>
                                </div>
                            </div>
                                
                            </form>
                        </div>
                    </div>
                    
                          
                </div>
        </div>";}
        else{
            echo "
            <div class='card text-center'>
                <div class='card-header'>
                    <ul class='nav nav-pills card-header-pills'>
                    <li class='nav-item'>
                    <a class='nav-link' href='allqueries.php?id=$query_id'>Info</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link active' href='query.php?id=$query_id'>Query</a>
                    </li>
                    </ul>
                </div>
                <div class='card-body'>
                <div class='container text-left'>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Name</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_name</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Email</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0' text-align-left>
                            <h6 class='cah1'>$query_email</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Roll No.</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_rollno</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Mobile No.</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_mobile_no</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Year</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_year</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Program</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_program</h6>
                        </div>
                    </div>
                    
                    <div class='row justify-content-start mb-2 text-align-left'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Issue Type</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_issue</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Date - Time</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_date</h6>
                        </div>
                    </div>

                    <div class='row justify-content-flex-start mb-2 '>
                        <div class='col-4'>
                            <h5 class='cah1'><strong>Description</strong></h5>
                        </div>
                        <div class='col-md-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_brief</h6>
                        </div>
                    </div>
                    <div class='row justify-content-flex-start mb-2 '>
                        <div class='col-4'>
                            <h5 class='cah1'><strong>Assigned To</strong></h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                        <h6 class='cah1'>$query_assigned</h6>
                        </div>
                    </div>
                          
                </div>
        </div>";
        // message();
        }
        }
    }
   
}


// -----------------------Users----------------------
function getdatabox1($username ,$id){
    global $con;
    if(isset($_GET['id'])){
    // $id =$_GET['id'];
    $select_query = "Select * from `$username`";
    $result_query = mysqli_query($con, $select_query);
    while($row_data = mysqli_fetch_assoc($result_query)){

        $query_id = $row_data['id'];
        $query_name = $row_data['name'];
        $query_email = $row_data['email'];
        $query_rollno = $row_data['rollno'];
        $query_mobile_no = $row_data['mobile_no'];
        $query_year = $row_data['year'];
        $query_program = $row_data['program'];
        echo "<div class='col-md-6'>
        <div class='card text-center'>
            <div class='card-header'>
                <ul class='nav nav-pills card-header-pills'>
                <li class='nav-item'>
                <a class='nav-link active' href='webpage.php?id=$id'>Info</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='webquery.php?id1=$id&id2=$query_id'>Query</a>
                </li>
                </ul>
            </div>
            <div class='card-body'>
                <h5 class='cah1'> Name : $query_name</h5>
                <h5 class='cah1'>Email : $query_email</h5>
                <h5 class='cah1'>Roll No. : $query_rollno</h5>
                <h5 class='cah1'>Mobile Number : $query_mobile_no</h5>
                <h5 class='cah1'>Year : $query_year</h5>
                <h5 class='cah2'>Program: $query_program</h5> 
             </div>    
        </div>
    </div>";
    }
}
}
function delete2($username){
    global $con;
    
    $delete_query = "DELETE FROM `$username` WHERE `id` IN (SELECT `id` FROM `solved`)";
    $delete_result = mysqli_query($con, $delete_query);
}

function viewdetails2($username,$id){
    global $con;
    if(isset($_GET['id2'])){
        $dataid = $_GET['id2'];
        $select_query = "Select * from `$username` where id = '$dataid'";
        $result_query = mysqli_query($con, $select_query);
        while($row_data = mysqli_fetch_assoc($result_query)){

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

            
            echo "
            <div class='card text-center'>
                <div class='card-header'>
                    <ul class='nav nav-pills card-header-pills'>
                    <li class='nav-item'>
                    <a class='nav-link' href='webpage.php?id=$id'>Info</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link active' href='webquery.php?id=$query_id'>Query</a>
                    </li>
                    </ul>
                </div>
                <div class='card-body'>
                <div class='container text-left'>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Name</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_name</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Email</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0' text-align-left>
                            <h6 class='cah1'>$query_email</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Roll No.</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_rollno</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Mobile No.</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_mobile_no</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Year</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_year</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Program</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_program</h6>
                        </div>
                    </div>
                    
                    <div class='row justify-content-start mb-2 text-align-left'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Issue Type</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_issue</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Date - Time</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_date</h6>
                        </div>
                    </div>

                    <div class='row justify-content-flex-start mb-2 '>
                        <div class='col-4'>
                            <h5 class='cah1'><strong>Description</strong></h5>
                        </div>
                        <div class='col-md-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_brief</h6>
                        </div>
                    </div>
                    <div class='row justify-content-flex-start mb-2 '>
                        <div class='col-4'>
                            <h5 class='cah1'><strong>Remarks</strong></h5>
                        </div>
                        <div class='col-md-4 text-align-left p-0'>
                        <form action='' method='post' enctype=multipart/form-data'>
                            <div class='col-md-12'>
                                <input type='text' name='remark' id='remark' class='form-control m-2' placeholder='Remark' required='required'>
                            </div>
                        
                    
                    <input type='submit' class='btn1 mb-4' name='submit' id='submit' value='Solved'>
                    </form>
                    </div>
                            
                </div>
        </div>";
        }
    }
   
}



// ---------------------Solved-----------------
function solry(){
    global $con;
    // if(isset($_GET['id'])){
    $select_query = "Select * from `solved`";
    $result_query = mysqli_query($con, $select_query);
    while($row_data = mysqli_fetch_assoc($result_query)){

        $query_id = $row_data['id'];
        $query_name = $row_data['name'];
        $query_email = $row_data['email'];
        $query_rollno = $row_data['rollno'];
        $query_mobile_no = $row_data['mobile_no'];
        $query_year = $row_data['year'];
        $query_program = $row_data['program'];
    
        echo "<div class='col-md-6'>
        <div class='card text-center'>
            <div class='card-header'>
                <ul class='nav nav-pills card-header-pills'>
                <li class='nav-item'>
                <a class='nav-link active' href='solved.php?id=$query_id'>Info</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='solvedquery.php?id=$query_id'>Query</a>
                </li>
                </ul>
            </div>
            <div class='card-body'>
                <h5 class='cah1'> Name : $query_name</h5>
                <h5 class='cah1'>Email : $query_email</h5>
                <h5 class='cah1'>Roll No. : $query_rollno</h5>
                <h5 class='cah1'>Mobile Number : $query_mobile_no</h5>
                <h5 class='cah1'>Year : $query_year</h5>
                <h5 class='cah2'>Program: $query_program</h5> 
            </div>    
        </div>
    </div>";
    }
}

function viewdetails1(){
    global $con;
    if(isset($_GET['id'])){
        $dataid = $_GET['id'];
        $select_query = "Select * from `solved` where id = $dataid";
        $result_query = mysqli_query($con, $select_query);
        while($row_data = mysqli_fetch_assoc($result_query)){

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
            $query_remarks = $row_data['Remarks'];

            
            echo "
            <div class='card text-center'>
                <div class='card-header'>
                    <ul class='nav nav-pills card-header-pills'>
                    <li class='nav-item'>
                    <a class='nav-link' href='solved.php?id=$query_id'>Info</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link active' href='solvedquery.php?id=$query_id'>Query</a>
                    </li>
                    </ul>
                </div>
                <div class='card-body'>
                <div class='container text-left'>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Name</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_name</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Email</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0' text-align-left>
                            <h6 class='cah1'>$query_email</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Roll No.</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_rollno</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Mobile No.</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_mobile_no</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Year</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_year</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Program</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_program</h6>
                        </div>
                    </div>
                    
                    <div class='row justify-content-start mb-2 text-align-left'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Issue Type</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_issue</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Date - Time</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_date</h6>
                        </div>
                    </div>

                    <div class='row justify-content-flex-start mb-2 '>
                        <div class='col-4'>
                            <h5 class='cah1'><strong>Description</strong></h5>
                        </div>
                        <div class='col-md-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_brief</h6>
                        </div>
                    </div>
                    <div class='row justify-content-flex-start mb-2 '>
                        <div class='col-4'>
                            <h5 class='cah1'><strong>Remarks</strong></h5>
                        </div>
                        <div class='col-md-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_remarks</h6>
                        </div>
                    </div>
                            
                </div>
        </div>";
        }
    }
   
}

?>