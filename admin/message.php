<?php
    if(isset($_SESSION['message'])) :
        session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){

    header("Location: ../signin.php");
    exit();
}
?>

    <div class="alert alert-warning alert-dismissible fade show " role="alert">
        <strong>Hey!</strong> <?= $_SESSION['message']; ?>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
    </div>

<?php 
    unset($_SESSION['message']);
    endif;
?>