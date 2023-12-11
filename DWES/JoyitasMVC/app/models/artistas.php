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
        $sql = 'SELECT * FROM cantantes WHERE id = ' . $params[0];
        $sth = $this->conexion->query($sql);
        $resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultados;
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

    // nuevo metodo para update 

    // nuevo metodo para delete
}
