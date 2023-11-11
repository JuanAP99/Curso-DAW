<?php

session_start();

if($_SESSION['nameUser'] != 'juanap99'){
    header("location:login.php");
}else {
    $_SESSION['listaProductos'] = $_POST;
    echo '<pre>';
    print_r($_SESSION['listaProductos']);
    echo '</pre>';
}




?>