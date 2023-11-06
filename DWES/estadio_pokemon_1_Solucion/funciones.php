<?php

function get_pokemons_and_positions($pokemons = array(), $number = 0){
  if(isset($pokemons)&&!empty($pokemons)){
    $keys_selected = array_rand($pokemons,$number);
    $keys_selected = array_flip($keys_selected);
    $pokemons_selected = array_intersect_key($pokemons, $keys_selected);

    //Añadir información de posición a los pokemons seleccionados
    $array_posiciones = [];
    $keys_selected = array_flip($keys_selected);

    for($i=0; $i<$number; $i++){
      do{
        $posicion = rand(1, NUMERO_POSICIONES);
      }while(in_array($posicion, $array_posiciones));
      $array_posiciones[]=$posicion;
      $pokemons_selected[$keys_selected[$i]]['posicion'] = $posicion;
    }
    
    return $pokemons_selected;
  }
}


function genera_estadio_markup($pokemons_a_pintar){

  $output = '<div class="estadio_container">';
  
  for($i=1 ; $i<=sqrt(NUMERO_POSICIONES); $i++){
    //Nueva fila
    $output .= '<div class="row" id="row-'.$i.'">';
    for($j=1 ; $j<=sqrt(NUMERO_POSICIONES); $j++){
      $posicion = (($i-1)*(sqrt(NUMERO_POSICIONES)))+$j;
      $output .= '<div class="column" id="posicion-'.$posicion.'">';
      
      $pokemon_filtrado = array_filter($pokemons_a_pintar, function($pokemon) use ($posicion){
        if($pokemon['posicion'] == $posicion){
          return true;
        }
        return false;
      });
      
      if(!empty($pokemon_filtrado)){
        //Pintamos al bicho
        $output .= '<img src="'.reset($pokemon_filtrado)['sprite'].'">';
      }

      $output .= '</div><!--/#posicion-'.$posicion.'-->';

    }
    $output .= '</div><!--/#row-'.$i.'-->';
  }
  $output .= '</div> <!--/.estadio_container-->';

  return $output;
}
function escribeInfo($pokemons_selected){
  
  $claves = array_keys($pokemons_selected);

  $contenido = file_get_contents("infoPokemon.csv",",");
  $arrContenido = explode(',' ,$contenido);
  $arrayParaComprobar = array_chunk($arrContenido,5);

  foreach($arrayParaComprobar as $index => $pokemon){

    


  }
  





}