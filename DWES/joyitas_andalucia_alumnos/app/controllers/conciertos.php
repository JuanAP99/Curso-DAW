<?php
class ConciertosController{

    private $modelo;

    // falla por que la consulta sql esta mal para poner el nombre del artista junto el concierto

    public function listar($params){
        // cargamos modelo
        $nombre_fichero_model ='../app/models/conciertos.php';
        
        if(file_exists($nombre_fichero_model)){
            // Incluimos el fichero model y lo instanciamos
            require_once($nombre_fichero_model);
            $this->modelo = new ConciertosModel();
            echo '<h2>soy concha, entro</h2>';
            
            $conciertos = $this->modelo->getConciertosList();
            var_dump($conciertos);
            // cargamos la vista
            $nombre_fichero_vista = '../app/views/conciertos.tpl.php';
            if(file_exists($nombre_fichero_vista)){
                include_once($nombre_fichero_vista);
            }
        }

    }
}