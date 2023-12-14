<?php
class ArtistasModel{
    private $conexion;
    public function __construct(){
        //Instanciar la conexión que estará disponible en el modelo.
        $this->conexion = new PDO('mysql:host=localhost;dbname=joyitas_andalucia', 'root', '');
    }
    public function getArtistasList(){
        $sql = 'SELECT * FROM artistas ORDER BY nombre';
        $sth = $this->conexion->query($sql);
        $resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }
    public function insertarArtista($id,$nombre,$genero,$precio_bolo,$localidad_nacimiento,$fecha_nacimiento){
        $sql = 'INSERT INTO artistas(id,nombre,genero,precio_bolo,localidad_nacimiento,fecha_nacimiento) VALUES ($id,$nombre,$genero,$precio_bolo,$localidad_nacimiento,$fecha_nacimiento)';
        $sth = $this->conexion->query($sql);
        $resultados= $sth->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }
    public function borrarArtista($id){
        $sql = "DELETE FROM cantantes WHERE id=$id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        $filasAfectadas = $stmt->rowCount();
        return $filasAfectadas;
    }
}