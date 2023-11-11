<?php

session_start();

require_once("vars.php");

if($_SESSION['nameUser'] != 'juanap99'){
    header("location:login.php");
}else {
    $_SESSION['listaProductos'] = $_POST;
    
    foreach($_SESSION['listaProductos']['producto'] as $clave => $valor){

        if (!empty($valor)){
            $productos[$clave+1]['cantidad'] = $valor;
        }


    }
    
    $_SESSION['carrito']= [];

    foreach($productos as $clave => $valor){

        if($productos[$clave]['cantidad'] != 0){

            $_SESSION['carrito'] = $productos[$clave];

        }
    }

    /* En carrito ya tengo todo lo que he seleccionado arteriormente */


  echo '<pre>';
  print_r($carrito);
  echo '</pre>';
}




?>