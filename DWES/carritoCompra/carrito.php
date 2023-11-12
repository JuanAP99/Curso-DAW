<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

session_start();

require_once("vars.php");

if($_SESSION['nameUser'] != 'juanap99'){
    header("location:login.php");
} 
     
if(isset($_POST['producto'])){

    $_SESSION['listaProductos'] = $_POST;
    
    foreach($_SESSION['listaProductos']['producto'] as $clave => $valor){
            if (!empty($valor)){
                $productos[$clave+1]['cantidad'] = $valor;
            }
      }     
}
    foreach($productos as $clave => $valor){

        if($productos[$clave]['cantidad'] != 0){
            $_SESSION['carrito'] [] = $productos[$clave];
            
        }
    }

    /* En carrito ya tengo todo lo que he seleccionado arteriormente */

    if(isset($_POST['mas']) || isset($_POST['menos'])){

        $claveAux = 0;
        foreach($_SESSION['carrito'] as $key => $producto){
            if(isset($_POST['mas'][$key])){
                ++$_SESSION['carrito'][$key]['cantidad'];
                print_r('Vaslor al sumar: '. $_SESSION['carrito'][$key]['cantidad']);
            }else if(isset($_POST['menos'][$key])){
                --$_SESSION['carrito'][$key]['cantidad'];
                print_r('Valor al retsar: '. $producto['cantidad']);
            }
            
            if($_SESSION['carrito'][$key]['cantidad'] == 0){
                unset($_SESSION['carrito'][$key]);
            }
    
        }
    }






    echo '<form action="carrito.php" method="post">';
    
    foreach($_SESSION['carrito'] as $clave => $valor){

        echo '<div>Producto: '.$valor['nombre'].'</div>';
        echo '<input type="hidden" name="entrado" value="entrado">';
        echo '<input type="submit" value="-" name="menos['.$clave.']">';
        echo '<div>Cantidad: '.$valor['cantidad'].'</div>';
        echo '<input type="submit" value="+" name="mas['.$clave.']"><br>';
    }

    echo '</form>';
    echo '<pre>';
    print_r($_SESSION['carrito']);
    
    echo '</pre>';




    
  





?>
</body>
</html>