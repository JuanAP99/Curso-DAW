<?php 

session_start();

if(isset($_SESSION['emailUser'])){

    unset($_SESSION['emailUser']);
    header("location: login.php");
    exit();
}



?>