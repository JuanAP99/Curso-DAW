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

    // Funcion de borrado simple cambiar el formulario por si lo quieres probar
    public function borrarArtista($id){
        $sql = "DELETE FROM artistas WHERE id=$id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        $filasAfectadas = $stmt->rowCount();
        return $filasAfectadas;
    }
// funcion con la transaccion hago la anterior por si no va esta intentao


    public function borrarArtistaYSusConciertos($id){
        
        $sql1 = "DELETE FROM artistas WHERE id = $id";
        $sql2 = "DELETE * FROM conciertos WHERE id_artista = $id";
        $stmt = $this->conexion;

      try{
        $stmt->beginTransaction();
        $stmt->exec($sql1);
        $stmt->exec($sql2);
        $stmt->commit();
        echo 'Borrado con éxito';
      }catch(PDOException $e){
        $stmt->rollback();
        echo 'Ups, algo salió mal';
      }
        

    }
}