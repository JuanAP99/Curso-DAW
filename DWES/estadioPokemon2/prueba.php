<?php 

$pokemonSeleccionados = [];
include_once('pokemon.php');

function eligeMiTeam(){

    $output='';

    $output .= '<form action="" method="post">';

    foreach($pokemons as $key => $pokemonInfo){

        if(isset($pokemonInfo['nombre'])){

            $output .= '<input type="checkbox" id="'.$key.'" name="pokemon_id:'.$key.'" value="'.$pokemonInfo['nombre'].'">';
            $output .= '<label for="pokemon_id:'.$key.'" > '.$pokemonInfo['nombre'].'</label>';            

        }
           
    }

    $output .= '<br><input type="submit" name="Elegir" value="Elegir">';

    $output .= '</form>';

   return $output;

}

?>