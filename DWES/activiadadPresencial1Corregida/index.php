<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('vars.php');
require_once('funciones.php');


$formulario = get_formulario_markup();



require_once('template.php');
?>