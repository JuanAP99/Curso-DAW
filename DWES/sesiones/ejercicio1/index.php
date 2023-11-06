<?php 
session_start(); /* Funcion para decir que en mi código voy a utilizar las sesiones */

    if(isset($_POST['reiniciar'])){
        
        session_unset();
        session_destroy();
    }


    /* Tenemos que controlar que esté o no esté establecida */

    if(!isset($_SESSION['contador'])){

        /* Desarrollo codigo para la primera vez que entra */ 

        echo 'Primera vez que entra inicializamos contador de visitas';
        $_SESSION['contador'] = 1; 

    }else {

        /* Desarrollamos codigo para veces sucesivas */

        $_SESSION['contador']+=1;
        echo 'Es la vez '.$_SESSION['contador'].' que entras en la pagina'; 
        
    }

    echo '<form action="" method="post">';
    echo '<input type="submit" name="reiniciar" value="Reiniciar">';
    echo '<label for="reiniciar"></label>';
    echo '</form';

    
?>
