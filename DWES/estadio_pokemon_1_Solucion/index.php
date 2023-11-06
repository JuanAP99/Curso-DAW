<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('vars.php');
require_once('funciones.php');
//Procesado
$pokemons_con_posiciones = get_pokemons_and_positions($pokemons,2);
echo '<pre>';
print_r($pokemons_con_posiciones);
echo '</pre>';
$content = genera_estadio_markup($pokemons_con_posiciones);

require_once('template.php');


$contenido = file_get_contents("infoPokemon.csv",",");
$arrContenido = explode(',' ,$contenido);


$arrayPrueba = array_chunk($arrContenido,5);
print_r($arrayPrueba);



?>