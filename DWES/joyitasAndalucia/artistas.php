<?php 

$servername="localhost";
$username="root";
$password ="";
$dbname= "joyitas_andalucia";

$conn = mysqli_connect($servername, $username, $password,$dbname);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
echo "Conexión realizada";


function listarCantantes($conn){

    $sentencia = "SELECT * FROM cantantes";

    $resultado = $conn->query($sentencia);

    if($resultado->num_rows > 0){
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }else{
        return [];
    }

}

function insertarArtista($conn, $id, $nombre, $genero, $fechaNacimiento, $precioBolo, $localidadNacimiento) {
    $sql = "INSERT INTO cantantes (id,nombre, genero, fecha_nacimiento, precio_bolo, localidad_nacimiento) VALUES ('$id','$nombre', '$genero', '$fechaNacimiento', $precioBolo, '$localidadNacimiento')";
    return $conn->query($sql);
}

function actualizarArtista($conn, $id, $nombre, $genero, $fechaNacimiento, $precioBolo, $localidadNacimiento) {
    $sql = "UPDATE cantantes SET nombre='$nombre', genero='$genero', fecha_nacimiento='$fechaNacimiento', precio_bolo=$precioBolo, localidad_nacimiento='$localidadNacimiento' WHERE id=$id";
    return $conn->query($sql);
}

function borrarArtista($conn, $id) {
    $sql = "DELETE FROM cantantes WHERE id=$id";
    return $conn->query($sql);
}
function borrarConciertosArtista($conn, $artista){
    $sql = "DELETE FROM conciertos WHERE artista=$artista";
    return $conn->query($sql);
}
// Manejar las solicitudes POST para crear, actualizar o borrar artistas
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["crear"])) {
        insertarArtista($conn,$_POST["id"], $_POST["nombre"], $_POST["genero"], $_POST["fecha_nacimiento"], $_POST["precio_bolo"], $_POST["localidad_nacimiento"]);
    } elseif (isset($_POST["actualizar"])) {
        actualizarArtista($conn, $_POST["id"], $_POST["nombre"], $_POST["genero"], $_POST["fecha_nacimiento"], $_POST["precio_bolo"], $_POST["localidad_nacimiento"]);
    } elseif (isset($_POST["borrar"])) {
        
        $artistaID = $_POST["id"];
        
        // Iniciar transacción
        mysqli_begin_transaction($conn);

        // Intentar borrar conciertos vinculados
        if (borrarConciertosArtista($conn, $artistaID)) {
            // Intentar borrar el artista
            if (borrarArtista($conn, $artistaID)) {
                // Confirmar la transacción si todo fue exitoso
                mysqli_commit($conn);
            } else {
                // Deshacer la transacción si hubo un error al borrar el artista
                mysqli_rollback($conn);
            }
        } else {
            // Deshacer la transacción si hubo un error al borrar conciertos
            mysqli_rollback($conn);
        }
    }
    }

// Obtener la lista de artistas
$artistas = listarCantantes($conn);

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Artistas</title>
</head>
<body>
    <h1>Lista de Artistas</h1>

    <!-- Mostrar la lista de artistas -->
    <ul>
        <?php foreach ($artistas as $artista) : ?>
            <li>
                <?php echo 'ID: '.$artista["id"].'<br> Nombre: '.$artista["nombre"]; ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="id" value="<?php echo $artista["id"]; ?>">
                    <input type="submit" name="borrar" value="Borrar">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Acciones</h2>
    <form method="post" action="">

    <input type="submit" name="crearArtista" value="Crear">
    <input type="submit" name="actualizarArtista" value="Actualizar">
        </form>


        <?php
        
        if(isset($_POST['crearArtista'])){ ?>

<h2>Crear nuevo artista</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre">ID:</label>
        <input type="number" name="id" required>
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="genero">Género:</label>
        <input type="text" name="genero" required>
        <br>
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" required>
        <br>
        <label for="precio_bolo">Precio del Bolo:</label>
        <input type="text" name="precio_bolo" required>
        <br>
        <label for="localidad_nacimiento">Localidad de Nacimiento:</label>
        <input type="text" name="localidad_nacimiento" required>
        <br>
        <input type="submit" name="crear" value="Crear Artista">
    </form>




       <?php }elseif(isset($_POST['actualizarArtista'])){?>

        <h2>Actualizar artista</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nombre">ID:</label>
        <input type="number" name="id" required>
        <br>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre"  required>
    <br>

    <label for="genero">Género:</label>
    <input type="text" name="genero"  required>
    <br>

    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" name="fecha_nacimiento" required>
    <br>

    <label for="precio_bolo">Precio del Bolo:</label>
    <input type="text" name="precio_bolo"  required>
    <br>

    <label for="localidad_nacimiento">Localidad de Nacimiento:</label>
    <input type="text" name="localidad_nacimiento"  required>
    <br>

    <input type="submit" name="actualizar" value="Actualizar">
</form>




        <?php }elseif(!isset($_POST['crearArtista']) || !isset($_POST['actualizarArtista'])){

        }else{
            
        }
        
        ?>


    <!-- Formulario para crear un nuevo artista -->
    
   
</body>
</html>