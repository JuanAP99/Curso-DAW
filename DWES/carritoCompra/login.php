<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Document</title>
</head>
<body>
    
    <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$_SESSION['nameUser'] = '';
$_SESSION['passUser'] = '';

$fp = fopen ("users.csv","r");
while ($data = fgetcsv ($fp, 1000, ",")) {
    $num = count ($data);
    $nombreUsuario = $data[0];
    $pass = $data[1];
    }
fclose ($fp);


        if(isset($_POST['btnEnviar'])){
            

            if($_POST['nameUser'] == $nombreUsuario && $_POST['passUser'] == $pass) {
                $_SESSION['nameUser'] = $_POST['nameUser'];
                $_SESSION['passUser'] = $_POST['passUser'];                
                header("location: index.php");
                exit();
            }else{
                echo '<h4>Se ha producido un error de credenciales, intenta logearte de nuevo</h4>';
                echo  '<form action="login.php" method="post">';
                echo   '<label for="nameUser">Nombre de usuario</label><br>';
                echo   '<input type="text" name="nameUser" id="nameUser"><br>';
                echo  '<label for="nameUser">Contraseña</label><br>';
                echo   '<input type="password" name="passUser" id="passUser"><br>';
                echo   '<input type="submit" name="btnEnviar" value="Login">';
                echo '</form>';
            }

        }else{
            echo  '<form action="login.php" method="post">';
            echo   '<label for="nameUser">Nombre de usuario</label><br>';
            echo   '<input type="text" name="nameUser" id="nameUser"><br>';
            echo  '<label for="nameUser">Contraseña</label><br>';
            echo   '<input type="password" name="passUser" id="passUser"><br>';
            echo   '<input type="submit" name="btnEnviar" value="Login">';
            echo '</form>';
        }
        
        
    
    ?>



</body>
</html>