<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



/* Enunciado: 

Realiza una aplicación que funcione como gestora del carro de la compra, bajo inicio de sesión. Una vez logueado, el usuario es conducido a un formulario en el que podrá 
gestionar los productos que va a comprar. Cada producto cuenta con un botón + y otro - para sumar o restar una unidad al número de unidades que se van a incluir en el 
carro. Cuando se pulsa añadir al carrito, ese número de unidades es añadido. El formulario cuenta, adicionalmente, con un botón Ver carrito que conduce al carro de la 
compra.En la página del carro de la compra se puede reducir o ampliar directamente el número de unidades de un producto incluidas en él. Si el número de unidades de un 
producto es 0, el producto debe desaparecer del carrito.

Basicamente el punto 1 es :

Mirar si los post no estan vacios y estan establecidos; que no te redirigo a login.php

Una vez establecidos tengo que mirar que el usuario y la contraseña son las que estan en el archivo csv a

*/


require_once("functions.php");
require_once("vars.php");


$fp = fopen ("users.csv","r");

/*  Meter en un array seria mas correcto no? */

while ($data = fgetcsv ($fp, 1000, ",")) {
    $num = count ($data);
    $nombreUsuario = $data[0];
    $pass = $data[1];
    }

fclose ($fp);

if(!isset($_POST['nameUser']) && empty($_POST['nameUser']) && !isset($_POST['passUser']) && empty($_POST['passUser'])){

    header("location: login.php");

}else{
    
    if($_POST['nameUser'] == $nombreUsuario && $_POST['passUser'] == $pass){

        $_SESSION['nameUser'] = $_POST['nameUser'];
        $_SESSION['passUser'] = $_POST['passUser'];
        header("location: seleccion.php");
    }else {
        header("location: login.php");
    }
}

/* Si tengo que poner el array, puedo hacer tambien despúes meter todo el array de usuarios que tengo en el fichero csv */




?>