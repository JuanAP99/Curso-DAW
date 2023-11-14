<?php 
/* Para ver los errores  */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("vars.php");
require_once("funciones.php");

$imprime = generaChecksBox($videojuegos);

$imprime_tabla_filtrada = generaTablaFiltrada($videojuegos);

require_once("template.php");
?>