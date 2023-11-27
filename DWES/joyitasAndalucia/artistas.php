<?php 

$servername="localhost";
$username="username";
$password ="password";
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