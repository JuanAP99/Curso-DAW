<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "joyitas_andalucia";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Conexión realizada";

function listarConciertos($conn){
    $sentencia = "SELECT * FROM conciertos";
    $resultado = $conn->query($sentencia);

    if($resultado->num_rows > 0){
        return $resultado->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

function insertarConcierto($conn, $id, $fecha, $lugar, $artista) {
    $sql = "INSERT INTO conciertos (id, fecha, lugar, artista) VALUES ('$id', '$fecha', '$lugar', '$artista')";
    return $conn->query($sql);
}

function actualizarConcierto($conn, $id, $fecha, $lugar, $artista) {
    $sql = "UPDATE conciertos SET fecha='$fecha', lugar='$lugar', artista='$artista' WHERE id=$id";
    return $conn->query($sql);
}

function borrarConcierto($conn, $id) {
    $sql = "DELETE FROM conciertos WHERE id=$id";
    return $conn->query($sql);
}

// Manejar las solicitudes POST para crear, actualizar o borrar conciertos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["crear"])) {
        insertarConcierto($conn, $_POST["id"], $_POST["fecha"], $_POST["lugar"], $_POST["artista"]);
    } elseif (isset($_POST["actualizar"])) {
        actualizarConcierto($conn, $_POST["id"], $_POST["fecha"], $_POST["lugar"], $_POST["artista"]);
    } elseif (isset($_POST["borrar"])) {
        borrarConcierto($conn, $_POST["id"]);
    }
}

// Obtener la lista de conciertos
$conciertos = listarConciertos($conn);

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Conciertos</title>
</head>
<body>
    <h1>Lista de Conciertos</h1>

    <!-- Mostrar la lista de conciertos -->
    <ul>
        <?php foreach ($conciertos as $concierto) : ?>
            <li>
                <?php echo 'ID: ' . $concierto["id"] . '<br> Fecha: ' . $concierto["fecha"] . '<br> Lugar: ' . $concierto["lugar"] . '<br> Artista: ' . $concierto["artista"]; ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="id" value="<?php echo $concierto["id"]; ?>">
                    <input type="submit" name="borrar" value="Borrar">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Acciones</h2>
    <form method="post" action="">
        <input type="submit" name="crearConcierto" value="Crear">
        <input type="submit" name="actualizarConcierto" value="Actualizar">
    </form>

    <?php
    if (isset($_POST['crearConcierto'])) { ?>
        <h2>Crear nuevo concierto</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="id">ID:</label>
            <input type="number" name="id" required>
            <br>
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" required>
            <br>
            <label for="lugar">Lugar:</label>
            <input type="text" name="lugar" required>
            <br>
            <label for="artista">Artista:</label>
            <input type="text" name="artista" required>
            <br>
            <input type="submit" name="crear" value="Crear Concierto">
        </form>
    <?php } elseif (isset($_POST['actualizarConcierto'])) { ?>
        <h2>Actualizar concierto</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="id">ID:</label>
            <input type="number" name="id" required>
            <br>
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" required>
            <br>
            <label for="lugar">Lugar:</label>
            <input type="text" name="lugar" required>
            <br>
            <label for="artista">Artista:</label>
            <input type="text" name="artista" required>
            <br>
            <input type="submit" name="actualizar" value="Actualizar Concierto">
        </form>
    <?php } elseif (!isset($_POST['crearConcierto']) || !isset($_POST['actualizarConcierto'])) {
        // Puedes agregar más contenido aquí si es necesario
    } else {
        // Puedes agregar más contenido aquí si es necesario
    }
    ?>
</body>
</html>
