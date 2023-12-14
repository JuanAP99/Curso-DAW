<?php
class ArtistasModel{
    private $conexion;
    public function __construct(){
        //Instanciar la conexión que estará disponible en el modelo.
        $this->conexion = new PDO('mysql:host=localhost;dbname=joyitas_andalucia', 'joyitas_andalucia', 'joyitas');
    }
    public function getArtistasList(){
        $sql = 'SELECT * FROM cantantes ORDER BY nombre';
        $sth = $this->conexion->query($sql);
        $resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }
    public function altaArtista(){
        $sql = "INSERT INTO cantantes (id,nombre, genero, fecha_nacimiento, precio_bolo, localidad_nacimiento) VALUES ('$id','$nombre', '$genero', '$fechaNacimiento', $precioBolo, '$localidadNacimiento')";

    }
}