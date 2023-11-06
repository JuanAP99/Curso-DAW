<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    

    <?php 

    include 'pokemon.php';

    /* Funciones */
    
    /* 1º crear una funcion que me saque 4 pokemon aleatorios y los 
        meta en otro array (meterle una  clave 'id' para diferenciar a quien saco )
     */

     function PokemonAleatorios($pokemonData, $cantidad = 4) {
        $pokemonAleatorioTabla = [];
        $keys = array_rand($pokemonData, $cantidad);
        $i=0;

        foreach ($keys as $key) {
            $pokemon = $pokemonData[$key];
            $pokemonAleatorioTabla[] = [
                'nombre' => $key,
                'tipo' => $pokemon['tipo'],
                'estadisticas' => $pokemon['estadisticas'],
                'habilidades' => $pokemon['habilidades'],
                'img' => $pokemon['img'],
                'num' => $pokemon['num'],
                'id' => $i
            ];
            $i++;
        }
        return $pokemonAleatorioTabla;
    }
    /* 
        2º funcion para escoger el pokemon y devolver la imagen segun el id
    */

    function traerPokemonParaPintar($pokemonesAleatorios, $i){

        foreach($pokemonesAleatorios as $pokemonName => $pokemonInfo){

            if ($pokemonInfo['id'] == $i){
                return $pokemonInfo['img'];
            }

        }
        return;
    }
    


    /* Crear tablero de combate 
    
        1º tengo que crear un primer for para cada fila
        2º tengo que crear un for para cada columna
        3º dentro del for compruebo el id 
    
    */
    ?>


    <div>
        <h1>Tablero de combate</h1>
    </div>

    <table border="1">

        


        <?php

            $pokemonesAleatorios = pokemonAleatorios($pokemonData, 4);
            $pokemonParaPintar;
            $posiciones =  [];
            $posicionActual = [];

            for($i=0;$i<5;$i++){
                
                echo '<tr>';

            $colParaPintar = rand(0,4);    
            
                $posicionActual = [

                    'fila' => $i,
                    'columna' => $colParaPintar
                    
                ];
               
                array_push($posiciones,$posicionActual);

            $pokemonParaPintar = traerPokemonParaPintar($pokemonesAleatorios, $i);

                for($j=0;$j<5;$j++){

                    if ($j==$colParaPintar && isset($pokemonParaPintar)){
                       echo '<td><img src="'.$pokemonParaPintar.'" </tr>';
                    }else{
                        echo '<td></td>';
                    }

                }
                echo '</tr>';
            }
        ?>
    </table>
</body>
</html>