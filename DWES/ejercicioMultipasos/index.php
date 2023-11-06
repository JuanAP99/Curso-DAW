<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();



if (isset($_POST['musculo_a_mejorar'])){
    $_SESSION['musculo_a_mejorar'] = $_POST['musculo_a_mejorar'];
}
if (isset($_POST['kilos'])){
    $_SESSION['kilos'] = $_POST['kilos'];
}
if (isset($_POST['repeticiones'])){
    $_SESSION['repeticiones'] = $_POST['repeticiones'];
}
if (isset($_POST['seleccion_Mejora'])){
    $_SESSION['seleccion_Mejora'] = $_POST['seleccion_Mejora']; 
}
if (isset($_POST['Nombre'])){
    $_SESSION['Nombre'] = $_POST['Nombre'];
}
if (isset($_POST['Email'])){
    $_SESSION['Email'] = $_POST['Email'];
}

if (!isset($_SESSION['formulario'])) {
    $_SESSION['formulario'] = array();
}


require_once('vars.php');
require_once('functions.php');

$nivel = dame_nivel();
$cadena = dame_plan($nivel);

if (!empty($_POST) && isset($_POST['paso'])  ) {
    $_SESSION['formulario'] = array_merge($_SESSION['formulario'], $_POST);
    $_SESSION['pasoActual'] = $_POST['paso']; 
}else {
    $_SESSION['pasoActual'] = 1;
}
if(isset($_POST['siguiente'])){
    $_POST['paso']++;
    $_SESSION['pasoActual']++;
   
}else if(isset($_POST['anterior'])){
    $_SESSION['pasoActual']--;
    
}
if(isset($_SESSION['pasoActual']) && $_SESSION['pasoActual'] == 5){

    $datos = $_SESSION['formulario'];
    $get_markup = imprimeDatos($cadena);

}else{
    $get_markup = get_markup($formulario, $_SESSION['pasoActual'],$niveles);
    }



require_once ('template.php');

?>