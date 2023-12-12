<?php 

class ConciertoModel{

    private $conexion;
    public function __construct(){
        //Instanciamos la conexión
        $this->conexion = new PDO ('mysql:host=localhost;dbname=joyitas_andalucia', 'root', '');
    }
    
    public function getConciertosListToObject(){

        require_once('concierto.php');
        $sql = 'SELECT * FROM conciertos co, cantantes ca  WHERE co.artista=ca.id';
        $sth = $this->conexion->query($sql);
        $resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
        $conciertos = [];
        
        foreach($resultados as $object):
            $concierto = new Concierto($object['id'],$object['fecha'],$object['lugar'],$object['artista']);
            array_push($conciertos, $concierto);
        endforeach;

        return $conciertos;
    }

    
}

?>