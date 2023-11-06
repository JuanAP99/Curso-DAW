<?php 

/* Elegir pokemon 

    1º Recorrer el array de $pokemons, y mediante checkboxes elegir solamente 4.

    2º Con el POST tengo mis pokemon ahí, ahora tengo que recorrer otra vez el array de pokemons y comparar 
*/


function elige_markup($pokemons){


    /* Función para generar un checkbox por cada pokemon  */ 

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


/*        */

function miEquipo($pokemons){

    $pokemonElegidos = [];

    foreach($pokemons as $key => $pokemonInfo){

        $pokemonID = 'pokemon_id:'.$key;
        $pokemon = [];

        if(isset($_POST['Elegir'])){

            if(isset($_POST[$pokemonID]) ){

                    $pokemon =  $pokemons[$key] ;
                
                array_push($pokemonElegidos,$pokemon);   
            }
        }           
    }

        return $pokemonElegidos;
}
    

/*

////////////////////
//////  CSV   //////
////////////////////


1º 

*/

function tratarCSV(){

    $listaPokemon = [];

  
    $archivo_csv = 'pokemon.csv';

    $i = 1;

    if (($gestor = fopen($archivo_csv, 'r')) !== false) {
    
     while (($fila = fgetcsv($gestor, 1000, ',')) !== false) {
 
        
        $nombre = $fila[0];
        $tipo = $fila[1];
        $fuerza = $fila[2];
        $ps = $fila[3];
        $sprite = $fila[4];

        $fila_asociativa = [
            
                'nombre' => $nombre,
                'tipo' => $tipo,
                'fuerza' => $fuerza,
                'ps' => $ps,
                'sprite' => $sprite
            
        ];

        $listaPokemon[$i] = $fila_asociativa;

        $i++;
        
        
    }
        fclose($gestor); 
    }else {
    echo "No se pudo abrir el archivo CSV.";
    }

    return $listaPokemon;
}









/* 
2º teniendo el csv, a partir de checkboxes se hara la eleccion (formulario)

*/



?>