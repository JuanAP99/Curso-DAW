<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Estadio Pokemon</title>
</head>
<body>
    <div>Estadio Pokemon</div>
    <?php

    const NUMEROS_POKEMON = 4;

    function devuelveArrayRandom (){
        $arrayRandom = array();
        

        for ($i = 0; $i <= NUMEROS_POKEMON; $i++) {

            $numero_aleatorio = rand(1,20); 
            
            if(in_array($numero_aleatorio,$arrayRandom)){
                
                $numero_aleatorio = rand(1,20);

            }else{
                array_push($arrayRandom, $numero_aleatorio);
            }


        }
        return $arrayRandom;
    }
        
        
    
    // Terminar array de pokemon
   include 'pokemon.php';
    
    ?>
    <table border="1" class="tabla-1">
        <tr>
            <th>Nombre:</th>
            <th>Tipo:</th>
            <th>Estadisticas base:</th>
            <th>Habilidades:</th>
            <th>Imagen: </th>
        </tr>
     <?php 

    $arrayNumRand = devuelveArrayRandom();

     foreach ($pokemonData as $pokemonName => $pokemonInfo){

        // Recorrer numeros aleatorios y comparar el num

     for ($i = 0; $i < NUMEROS_POKEMON; $i++){

       if(isset($pokemonInfo['num'])&& $arrayNumRand[$i]==$pokemonInfo['num']){

            echo '<tr>';
            echo '<td>' . $pokemonName . '</td>';
            echo '<td>' . $pokemonInfo['tipo'] . '</td>';
            echo '<td>' . implode(', ',$pokemonInfo['estadisticas']) . '</td>';
            echo '<td>' . implode(', ',$pokemonInfo['habilidades']) . '</td>';
            echo '<td><img src="' . $pokemonInfo['img'] . '"></td>';
            echo '</tr>';

        }
     } 
    }

     ?>
</table>
<table border="1" class="tabla-2">
        <tr>
            <th>Imagen: </th>
            <th>Habilidades:</th>
            <th>Estadisticas base:</th>
            <th>Tipo:</th>
            <th>Nombre:</th>
        </tr>

     <?php

     $arrayNumRand2 = devuelveArrayRandom();


     foreach ($pokemonData as $pokemonName => $pokemonInfo){

        // Recorrer numeros aleatorios y comparar el num

     for ($i = 0; $i < NUMEROS_POKEMON; $i++){


       if(isset($pokemonInfo['num'])&& $arrayNumRand2[$i]==$pokemonInfo['num']){

            echo '<tr>';
            echo '<td><img src="' . $pokemonInfo['img'] . '"></td>';
            echo '<td>' . implode(', ',$pokemonInfo['habilidades']) . '</td>';
            echo '<td>' . implode(', ',$pokemonInfo['estadisticas']) . '</td>';
            echo '<td>' . $pokemonInfo['tipo'] . '</td>';
            echo '<td>' . $pokemonName . '</td>';
            echo '</tr>';

        }
     } 
    }
    ?> 
    </table>
</body>
</html>

