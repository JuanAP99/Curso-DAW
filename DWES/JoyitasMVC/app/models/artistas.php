<?php
class ArtistasModel{
    
    private $conexion;
    public function __construct(){
        //Instanciar la conexión que estará disponible en el modelo.
        $this->conexion = new PDO('mysql:host=localhost;dbname=joyitas_andalucia', 'root', '');
        // var_dump($this->conexion);
    }
    public function getArtistasList(){
        $sql = 'SELECT * FROM cantantes ORDER BY nombre';
        $sth = $this->conexion->query($sql);
        $resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultados;
    }

    public function getArtistaById($params){
        $sql = 'SELECT * FROM cantantes WHERE id = '.$params[0];
        $sth = $this->conexion->query($sql);
        $resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function getArtistaByIdToObject($params){
        require_once ('artista.php');
        $sql = 'SELECT * FROM cantantes WHERE id = ' . $params[0];
        $sth = $this->conexion->query($sql);
        $resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($resultados as $object):
            $artista = new Artista($object['id'], $object['nombre'], $object['genero'], $object['fecha_nacimiento'], $object['precio_bolo'], $object['localidad_nacimiento']);
        endforeach;
        return $artista;
    }

    public function insertArtista($id, $nombre, $genero, $fechaNacimiento, $precioBolo, $lugarNacimiento){
        
        $sql = "INSERT INTO cantantes (id,nombre, genero, fecha_nacimiento, precio_bolo, localidad_nacimiento) VALUES (:id,'$nombre', '$genero', '$fechaNacimiento', $precioBolo, '$lugarNacimiento')";
        $stmt = $this->conexion->prepare($sql);

        // bindeo el parámetro id
        $stmt->bindParam(':id', $id);

        //Ejecuto la consulta
        $stmt->execute();

        // cojo las filas insertadas (1)
        $filasAfectadas = $stmt->rowCount();
        return $filasAfectadas;
    }

<<<<<<< HEAD
    // nuevo metodo para update 
    public function actualizarArtista($id, $nombre, $genero, $fechaNacimiento, $precioBolo, $localidadNacimiento){
=======
    // nuevo metodo para update asfasf
>>>>>>> 4352fcbe69f0e4552e3e1a391143d4c385e8c5fc

        $sql = "UPDATE cantantes SET nombre='$nombre', genero='$genero', fecha_nacimiento='$fechaNacimiento', precio_bolo=$precioBolo, localidad_nacimiento='$localidadNacimiento' WHERE id=$id";
        $stmt = $this->conexion->prepare($sql);

        $stmt->execute();
        $filasAfectadas = $stmt->rowCount();
        return $filasAfectadas;


    }
    // nuevo metodo para delete
    public function eliminarArtista($id){
        $sql = "DELETE FROM cantantes WHERE id=$id";
        $stmt = $this->conexion->prepare($sql);

        $stmt->execute();
        $filasAfectadas = $stmt->rowCount();
        return $filasAfectadas;
    }
}
