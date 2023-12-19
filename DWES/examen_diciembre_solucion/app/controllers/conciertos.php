<?php
class ConciertosController{
    public function listar($params){
        //Cargamos el modelo    
        $nombre_fichero_model = '../app/models/conciertos.php';
        if(file_exists($nombre_fichero_model)){
            
            require_once($nombre_fichero_model);
            $this->modelo = new ConciertosModel();
            //Sacamos los datos del modelo
            $conciertos = $this->modelo->getConciertosList();
            
            //Cargo la vista
            $nombre_fichero_vista = '../app/views/conciertos.tpl.php';
            if(file_exists($nombre_fichero_vista)){
                include($nombre_fichero_vista);
            }
        }
    }
}