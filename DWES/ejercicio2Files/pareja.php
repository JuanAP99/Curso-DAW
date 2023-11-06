<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="muestraDatos.php" method="post" enctype="multipart/form-data">
    <label for="txtNombrePareja">Nombre: </label><br> 
        <input type="text" id="txtNombrePareja" name="txtNombrePareja"> <br> 
        <label for="txtEmailPareja">Email: </label><br> 
        <input type="text" id="txtEmailPareja" name="txtEmailPareja"> <br> 
    </form>

    <?php
        $ruta_fichero = "datos/datos.txt";
        $nombre = $_POST["txtNombre"];
        $nombrePareja = $_POST["txtNombrePareja"];
        $email = $_POST["txtEmail"];
        $emailPareja = $_POST["txtEmailPareja"];

        $data .= $nombre . " " . $nombrePareja ;

        file_put_contents($ruta_fichero, $data);
    ?>
    
</body>
</html>