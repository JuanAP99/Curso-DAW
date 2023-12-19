<?php
class ArtistasModel{
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
    public function getArtistasList(){
        $sql = 'SELECT * FROM artistas ORDER BY nombre';
        $sth = $this->conexion->query($sql);
        $resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultados;
    }
    public function createArtista($artistaData){
        //Asumo que los datos vienen en un formato adecuado (el controlador se encarga de ello).
        //Asumo que las claves coinciden con los nombres de las columnas
        //Parametrizamos la consulta.
        $sql = "INSERT INTO artistas (nombre, genero, precio_bolo, localidad_nacimiento, fecha_nacimiento) VALUES (:nombre, :genero, :precio_bolo, :localidad_nacimiento, :fecha_nacimiento)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute($artistaData);
    }
    public function borrarArtista($id){
        //Debemos hacerlo por transacciones. Idealmente, si la base de datos hubiera sido bie nconfigurada no haría falta, porque para eso están los ONDELETE y los ONUPDATE de la definición de la foreign key
        //Seguimo el patrón visto en los apuntes, aunque existen otros.
        $this->conexion->beginTransaction();
        $params = array(':id_artista' => intval($id));
        $sql1 = "DELETE FROM conciertos WHERE id_artista = :id_artista";
        $sql2 = "DELETE FROM artistas WHERE id = :id_artista";
        //Se puede comprobar que funcionan las transacciones con una consulta erronea
        //$sql2Fake = "--DELETE FROM artistas WHERE id = :id_artista";
        $todo_bien = true;
        $stmt1 = $this->conexion->prepare($sql1);
        $result = $stmt1->execute($params);
        if($result == false){
            $todo_bien = false;
        }
        $stmt2 = $this->conexion->prepare($sql2);
        $result = $stmt2->execute($params);
        if($result == false){
            $todo_bien = false;
        }
        //Si todo ha ido bien confirmamos los cambios
        if($todo_bien){
            $this->conexion->commit();
        }else{
            $this->conexion->rollBack();
        }
    }
}