
<?php
class ConciertosController{

    private $modelo;

    public function listar(){
     echo 'se ha ejecutado el método listar del controlador de conciertos';

       $nombre_fichero_model = '../app/models/conciertos.php';
       if(file_exists($nombre_fichero_model)){
        include_once($nombre_fichero_model);
        $this->modelo = new ConciertoModel();
        $conciertos = $this->modelo->getConciertosListToObject();
        $nombre_fichero_vista = '../app/views/conciertos.tpl.php';

        if(file_exists($nombre_fichero_vista)){
            
            include_once($nombre_fichero_vista);
        }
       }    
    }
    public function ver($params){
        // tengo que cargar el modelo 

        $nombre_fichero_model = '../models/conciertos.php';
        if(file_exists($nombre_fichero_model)){
            include_once($nombre_fichero_model);
            $this->modelo = new ConciertoModel();
            $conciertos = $this->modelo->getConciertosListToObject();

            if(isset($conciertos) && !empty($conciertos)){
                // si establecido al menos un concierto y no esta vacio cargo la vista 
                $nombre_fichero_vista = '../app/views/verConcierto.tpl.php';
                include_once($nombre_fichero_vista);
            }else{
                var_dump('el concierto con id ' . $params[0] . ' no existe');
            }
        }
    }
}
?>