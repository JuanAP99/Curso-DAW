<?php
class ConciertosModel{
    private $conexion;
    public function __construct(){
        //Instanciar la conexión que estará disponible en el modelo.
        try{
            $this->conexion = new PDO('mysql:host=localhost;dbname=joyitas_andalucia', 'joyitas_andalucia', 'joyitas');
        }catch(Exception $e){
            //Creamos una excepción de las nuestras, con nuestro mensaje personalizado, y el status code que queremos mandar.
            throw new CustomException("Error conectando a la base de datos");
        }
    }
    public function getConciertosList(){
        //Hacemos la consulta, que debe incluir un inner join.
        $sql = 'SELECT c.nombre as nombre_concierto, c.fecha_hora, a.nombre as nombre_artista  FROM conciertos c INNER JOIN artistas a WHERE c.id_artista=a.id ORDER BY a.nombre';
        $sth = $this->conexion->query($sql);
        $resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultados;
    }
}