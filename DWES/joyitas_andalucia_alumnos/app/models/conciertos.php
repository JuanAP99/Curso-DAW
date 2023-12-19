<?php 
class ConciertosModel{
    private $conexion;
    public function __construct(){
        // Instanciamos la conexión
        $this->conexion = new PDO('mysql:host=localhost;dbname=joyitas_andalucia', 'root', '');
    }
    public function getConciertosList(){
        
        $sql = 'SELECT artistas.nombre,conciertos.id_concierto, FROM artistas,conciertos WHERE artista.id=conciertos.id_artista'; 
        $sth = $this->conexion->query($sql);
        $resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }
    
}

?>