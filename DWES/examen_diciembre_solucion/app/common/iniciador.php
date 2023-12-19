<?php
//Lo siguiente sólo para desarrollo
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Iniciamos sesiones, por si tenemos que hacer uso de ellas
session_start();
//TODO: Zona de declaración de constantes, etc

//TODO: Otras cosita que ya veremos


require_once('../app/common/custom_exception.php');
require_once('../app/common/core.php');
//Creando un bloque try catch nos aseguramos que cualquier excepción generada en nuestro código alcance el iniciador y pueda ser gestionada desde el bloque catch.
try{
    $core = new Core();
}catch(Exception $e){
    //TO DO
    if(get_class($e) == "CustomException"){
        http_response_code(500);
        echo $e->getCustomMessage();
    }
    
}
