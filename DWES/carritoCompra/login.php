<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    
        if(!isset($_POST['btnEnviar'])){

         echo  '<form action="index.php" method="post">';
         echo   '<label for="nameUser">Nombre de usuario</label><br>';
         echo   '<input type="text" name="nameUser" id="nameUser"><br>';
         echo  '<label for="nameUser">Contraseña</label><br>';
         echo   '<input type="password" name="passUser" id="passUser"><br>';
         echo   '<input type="submit" name="btnEnviar" value="Login">';
         echo '</form>';
            

        }

    
    ?>



    <form action="index.php" method="post">
        
        <label for="nameUser">Nombre de usuario</label><br>
        <input type="text" name="nameUser" id="nameUser"><br>
        <label for="nameUser">Contraseña</label><br>
        <input type="password" name="passUser" id="passUser"><br>
        <input type="submit" name="btnEnviar" value="Login">

    </form>


</body>
</html>