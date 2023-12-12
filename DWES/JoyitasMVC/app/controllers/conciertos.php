
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
}