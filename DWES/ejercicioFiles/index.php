<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="almacenar.php" method="post" enctype="multipart/form-data">

        <label for="txtNombre">Nombre: </label><br> 
        <input type="text" id="txtNombre" name="txtNombre"> <br> 
        <label for="txtEmail">Email: </label><br> 
        <input type="text" id="txtEmail" name="txtEmail"> <br> 
        <label for="bImagen">Imagen: </label><br> 
        <input type="file" id="bImagen" name="bImagen"> <br> 
        <input type="submit" value="Enviar">

    </form>




</body>
</html>