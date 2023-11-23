<?php

session_start();

require_once('../app/vars.php');
require_once('../app/functions.php');

//Aquí se realiza el procesado de las variables que proceda.
//TO DO

/* Del post me llega $_POST['evento_IDEVENTO'] == $_POST['evento_$campo] (en el foreach) */


if(!isset($_SESSION['emailUser'])){
    header("location: login.php");
    exit();
}



foreach($events as $campo => $valor){
    if (isset($_POST['evento_'.$campo])){
        $_SESSION['eventos_reservados'][$campo] = $events[$campo];
    }
    if (isset($_POST['borrar_'.$campo])){
        unset($_SESSION['eventos_reservados'][$campo]);
    }
}

print_r($_SESSION['eventos_reservados']);





$events_markup = get_events_form_markup_dinamico($events);
$booked_courses_markup = get_modal_booked_events_form();




$message = get_user_message();

require_once('../app/main_template.php');
?>