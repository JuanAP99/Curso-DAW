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

function insertarArtista($conn, $nombre, $genero, $fechaNacimiento, $precioBolo, $localidadNacimiento) {
    $sql = "INSERT INTO cantantes (nombre, genero, fecha_nacimiento, precio_bolo, localidad_nacimiento) VALUES ('$nombre', '$genero', '$fechaNacimiento', $precioBolo, '$localidadNacimiento')";
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
// Manejar las solicitudes POST para crear, actualizar o borrar artistas
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["crear"])) {
        insertarArtista($conn, $_POST["nombre"], $_POST["genero"], $_POST["fecha_nacimiento"], $_POST["precio_bolo"], $_POST["localidad_nacimiento"]);
    } elseif (isset($_POST["actualizar"])) {
        actualizarArtista($conn, $_POST["id"], $_POST["nombre"], $_POST["genero"], $_POST["fecha_nacimiento"], $_POST["precio_bolo"], $_POST["localidad_nacimiento"]);
    } elseif (isset($_POST["borrar"])) {
        borrarArtista($conn, $_POST["id"]);
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
                <?php echo $artista["nombre"]; ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="id" value="<?php echo $artista["id"]; ?>">
                    <input type="submit" name="borrar" value="Borrar">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Formulario para crear un nuevo artista -->
    <h2>Crear Nuevo Artista</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="hidden" name="id" value="<?php echo $artista["id"]; ?>">

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $artista["nombre"]; ?>" required>
    <br>

    <label for="genero">Género:</label>
    <input type="text" name="genero" value="<?php echo $artista["genero"]; ?>" required>
    <br>

    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" name="fecha_nacimiento" value="<?php echo $artista["fecha_nacimiento"]; ?>" required>
    <br>

    <label for="precio_bolo">Precio del Bolo:</label>
    <input type="text" name="precio_bolo" value="<?php echo $artista["precio_bolo"]; ?>" required>
    <br>

    <label for="localidad_nacimiento">Localidad de Nacimiento:</label>
    <input type="text" name="localidad_nacimiento" value="<?php echo $artista["localidad_nacimiento"]; ?>" required>
    <br>

    <input type="submit" name="actualizar" value="Actualizar">
</form>
</body>
</html>