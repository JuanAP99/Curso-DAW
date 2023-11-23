<?php

session_start();

require_once('../app/vars.php');
require_once('../app/functions.php');

//Aquí se realiza el procesado de las variables que proceda.
//TO DO

if(isset($_POST)){

    foreach($users as $clave => $valor){

        if($_POST['emailSesion'] == $valor['email']){
            $_SESSION['emailUser'] = $_POST['emailSesion'];
            header("location:index.php");
            exit();
        }
}

}






$message = get_user_message();

require_once('../app/login_template.php');
?>