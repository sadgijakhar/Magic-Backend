<?php  
include('../includes/connect.php');
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){

    header("Location: ../signin.php");
    exit();
}
// include('querytable.php');
 if(isset($_POST["export"]))  
 {  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=unsolved.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID', 'Name', 'Email', 'Roll no', 'Mobile no', 'Year','Program','Issue Type','Breif','Date','Assigned To'));  
      $query = "SELECT * from `query`";  
      $result = mysqli_query($con, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 if(isset($_POST["solved"]))  
 {  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=Solved.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID', 'Name', 'Email', 'Roll no', 'Mobile no', 'Year','Program','Issue Type','Breif','Date','Remarks','Assigned To'));  
      $query = "SELECT * from `solved`";  
      $result = mysqli_query($con, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  