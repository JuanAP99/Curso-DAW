<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once('duelo.php');
require_once('seleccion.php');

define("NUMERO_POSICIONES", 36);
/* $miEquipo = elegirEquipo(); */

    $pokemons = tratarCSV();
    $genera_elegir_markup = elige_markup($pokemons);  
    $miEquipo = miEquipo($pokemons); 
    $equipoRival = equipoRival($pokemons);
    $imprime_tabla = genera_tabla($miEquipo, $equipoRival);
    $elegirParaCombate = eligePelea($miEquipo, $equipoRival);
    
    

require_once('template.php');


?>