<?php
class ArtistasController{
    
    private $modelo;
    
    public function listar(){
        //Cargamos el modelo    
        $nombre_fichero_model = '../app/models/artistas.php';
        if(file_exists($nombre_fichero_model)){
            
            require_once($nombre_fichero_model);
            $this->modelo = new ArtistasModel();
            //Sacamos los datos del modelo
            $artistas = $this->modelo->getArtistasList();
    
            //Cargo la vista
            $nombre_fichero_vista = '../app/views/artistas.tpl.php';
            if(file_exists($nombre_fichero_vista)){
                include($nombre_fichero_vista);
            }
        }
        
    
    }

    public function ver($params){
        //Cargamos el modelo    
        $nombre_fichero_model = '../app/models/artistas.php';
        if(file_exists($nombre_fichero_model)){
            require_once($nombre_fichero_model);
            $this->modelo = new ArtistasModel();
            //Sacamos los datos del modelo
            $artistas = $this->modelo->getArtistaById($params);

            if(isset($artistas) && !empty($artistas)){
                $nombre_fichero_vista = '../app/views/verArtista.tpl.php';
                if(file_exists($nombre_fichero_vista)){
                    include($nombre_fichero_vista);
                }
            }else{
                var_dump('el artista con id ' . $params[0] . ' no existe');
            }
        }
    }

    public function insertar(){
        $nombre_fichero_vista = '../app/views/formArtista.tpl.php';
                if(file_exists($nombre_fichero_vista)){
                    include($nombre_fichero_vista);
                }
    }

    public function procesarInsert(){
        $nombre_fichero_model = '../app/models/artistas.php';
        if(file_exists($nombre_fichero_model)){
            
            require_once($nombre_fichero_model);
            $this->modelo = new ArtistasModel();
            //Sacamos los datos del modelo
            $numRegistros = $this->modelo->insertArtista($_POST['id'], $_POST['nombre'], $_POST['genero'], $_POST['fecha_nacimiento'], $_POST['precio_bolo'], $_POST['localidad_nacimiento']);
    
           if($numRegistros > 0){
                var_dump('El registro es correcto');
           }else{
            var_dump('El registro no se ha insertado bien :(');
           }
           
        }
    }

    public function actualizar($params){
        $nombre_fichero_vista = '../app/views/formArtistaActualizar.tpl.php';
        if(file_exists($nombre_fichero_vista)){
            include($nombre_fichero_vista);
        }
}
    

    public function procesarActualizar(){
        // hacer lo mismo que insert, crear un nuevo metodo en el modelo que haga update en base de datos
    }

    public function eliminar($params){
        var_dump('el registro con id ' .$params[0] . 'eliminar');
    }
}
?>