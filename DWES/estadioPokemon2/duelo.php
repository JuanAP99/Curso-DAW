<?php 

/*
    Enunciado:

    Duelo pokemon: En este segundo formulario, se distribuyen aleatoriamente por un tablero (tabla HTML) los pokemons 
    seleccionados por el jugador. Adicionalmente se distribuyen 4 pokemons seleccionados por la máquina. 
    Para la realización de esta parte se podrá hacer uso de las funciones desarrolladas en el primer proyecto. 
    En cada pokemon aparece su información de puntos y tipo. Mediante dos columnas de 4 campos select cada una, se eligen 
    las parejas de pokemon que se van a batir. Este script, llamado duelo.php mandará los datos del formulario a ganadores.php

-------------------------------------------------------------------------------------------------------------------------------------------

    Crear función para elegir 4 pokemon aleatorios traidos de la lista de 20 pokemons
    Crear otra funcion para pintar tanto los pokemon del jugador como los de la máquina

    1ºElegir 4 pokemons aleatorios para la máquina 

    2º Le doy posiciones a los pokemons tanto de la lista del jugador como los de la máquina y tienen que ser diferentes 

    3º Una vez seleccionadas la posiciones según la posición pintarlos.

    */

    function equipoRival($pokemons){

        $equipoRival = [];
        $datos = [];
        $numerosAleatorios = [];

        /* Me baso en el id para que no se repita, con array_rand barajo las claves  */
        $numerosAleatorios = array_rand($pokemons, 4);

        foreach ($numerosAleatorios as $indice) {
            $pokemonInfo = $pokemons[$indice];
            $datos = [
                'nombre' => $pokemonInfo['nombre'],
                'tipo' => $pokemonInfo['tipo'],
                'fuerza' => $pokemonInfo['fuerza'],
                'ps' => $pokemonInfo['ps'],
                'sprite' => $pokemonInfo['sprite']
            ];
            $equipoRival[$indice] = $datos;
        }
            return $equipoRival;
    }
    
    function genera_tabla($equipo1, $equipo2,){

        /* Creo un array de posiciones y otro con los dos equipos*/

        $arrayPosiciones = [];
        $posicion = 0;
        $totalEquipos = [];
        array_push($totalEquipos,$equipo1);
        array_push($totalEquipos,$equipo2);

 /* 
    totalEquipos es array de arrays, se que el primero tienes dos claves por eso lo recorro así , con in_array me 
    aseguro que no se repita la posición y se le meto la posición a cada pokemon elegido.
    
 */ 

        for ($i = 0; $i<2; $i++){
            foreach ($totalEquipos[$i] as $key => $teamInfo){
                    do{
                        $posicion = rand(1,36);
                    }while(in_array($posicion, $arrayPosiciones));
                    $arrayPosiciones[] = $posicion; 
                    $totalEquipos[$i][$key]['posicion'] = $posicion;  
            }

        }
        /* Generar tabla a partir de las posiciones*/ 

        $output = '';
        $output .= '<table>';
       
        for($i = 0; $i<6 ; $i++){

            $output .= '<tr>';

            for($j = 0; $j<6 ; $j++){
                $encontrado = false;
                foreach($totalEquipos as $equipo ){
                    foreach ($equipo as $equipoInfo){

                        /* Para que se distingan los equipos puedo controlar con el index del primer array si es 0 es del jugador si 
                        es 1 es de la maquina (lo puedo utilizar para colorear el fondo de un color u otro segun de quien es el pokemon). 
                        Un for para las filas otro para las columnas, veo que no se repita  */

                        if($equipoInfo['posicion'] == ($i * 6 + $j+1) && isset($equipo)){
                            $output .= '<td>';
                            $output .= '<img src="'.$equipoInfo['sprite'].'"><br>';
                            $output .= '<br>Nombre: '.$equipoInfo['nombre'];
                            $output .= '<br>Tipo: '.$equipoInfo['tipo'];
                            $output .= '<br>Fuerza: '.$equipoInfo['fuerza'];
                            $output .= '<br>PS: '.$equipoInfo['ps'];
                            $encontrado = true;
                            break;
                        }
                    }
                    if($encontrado){
                        break;
                    }
                }
                if(!$encontrado){
                    $output .= '<td></td>';
                }
            }
            $output.= '</tr>';
        }

        $output .= '</table>';
        return $output;
    }

    function eligePelea($equipo1,$equipo2){
       
        /* Creo un array con los dos equipos */

        $equipoTotal= [];
        $output ='';
        $equipoTotal[] = $equipo1;
        $equipoTotal[] = $equipo2;
        $contador = 0;

        /* recorrer el array de equipoTotal y a partir de los datos de este hacer el formulario*/
        
        $output.= '<form action="ganadores.php" method="post">';
        for($i=0 ; $i<2 ;$i++){
            $output .= '<select name="equipo '.$i.'[]">';
            foreach($equipoTotal[$i] as $key => $pokemonInfo){
                $pokemon = $equipoTotal[$i][$key];
               
                $output .='<option value="'.json_encode($pokemon).'" name="pokemon[]">'.$pokemon['nombre'].'</option>';
                
                $contador++;
            }
            $output .='</select>';
        }
        $output .= '<input type="submit" name="Enviar" value="Enviar">';
        $output.= '</form>';
       return $output;
    }
?>