<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Document</title>
</head>
<body>
    <h1>Videojuegos por inicial</h1>
    <form action="index.php" method="post">
    <input type="checkbox" name="chbox1" id="chbox1">A
    <input type="checkbox" name="chbox2" id="chbox2">B
    <input type="checkbox" name="chbox3" id="chbox3">C
    <input type="checkbox" name="chbox4" id="chbox4">D
    <input type="checkbox" name="chbox5" id="chbox5">E
    <input type="checkbox" name="chbox6" id="chbox6">F
    <input type="checkbox" name="chbox7" id="chbox7">G
    <input type="checkbox" name="chbox8" id="chbox8">H
    <input type="checkbox" name="chbox9" id="chbox9">I
    <input type="checkbox" name="chbox10" id="chbox10">J
    <input type="checkbox" name="chbox11" id="chbox11">K
    <input type="checkbox" name="chbox12" id="chbox12">L
    <input type="checkbox" name="chbox13" id="chbox13">M
    <input type="checkbox" name="chbox14" id="chbox14">N
    <input type="checkbox" name="chbox15" id="chbox15">Ñ
    <input type="checkbox" name="chbox16" id="chbox16">O
    <input type="checkbox" name="chbox17" id="chbox17">P
    <input type="checkbox" name="chbox18" id="chbox18">Q
    <input type="checkbox" name="chbox19" id="chbox19">R
    <input type="checkbox" name="chbox20" id="chbox20">S
    <input type="checkbox" name="chbox21" id="chbox21">W
    <input type="checkbox" name="chbox22" id="chbox22">Y
    <input type="checkbox" name="chbox23" id="chbox23">Z
    <br>
    <input type="submit" value="Filtrar">
    <button type="button">Reiniciar</button>
   
    </form>

    <?php 
        include("vars.php");
    ?>


    <table>

        <tr>
            <th>Nombre</th>
            <th>Fecha de lanzamiento</th>
            <th>creador</th>
        </tr>
    <?php 
    
    

   /*  echo '<pre>';
    
    print_r($videojuegos);
    echo '</pre>'; */ 

    $salida =""; 
    
    foreach ($videojuegos as $keygame => $datogames){

        $salida .= "<tr>";
        $salida .= '<td>'.$datogames['nombre'].'</td>'; 
        $salida .= '<td>'.$datogames['fecha'].'</td>';
        $salida .= '<td>'.$datogames['creador'].'</td>';
        $salida .= '</tr>';
    }

    echo $salida;

    ?>
    </table>
</body>
</html>