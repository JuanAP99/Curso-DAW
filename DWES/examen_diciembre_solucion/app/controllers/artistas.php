<?php
class ArtistasController{
    
    private $modelo;
    
    public function listar($params){
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
    public function borrar($params){
        //Damos la oportunidad de confirmación del borrado. Si se está enviando la confirmación, borramos y redirigimos al listar de artistas
        if(filter_input(INPUT_POST,'confirmar',FILTER_DEFAULT)){
            //Instanciamos el modelo, y borramos el artista (y los conciertos asociados)
            $nombre_fichero_model = '../app/models/artistas.php';
            $id = $params[0];
            if(file_exists($nombre_fichero_model)){
                require_once($nombre_fichero_model);
                $this->modelo = new ArtistasModel();   
                $this->modelo->borrarArtista($id);
                header('Location: ./index.php?path=artistas/listar');
            }
        }else{
            //Debemos mostrar un diálogo de confirmación, en el que pasamos el id a la vista
            $id = $params[0];
            //Cargo la vista
            $nombre_fichero_vista = '../app/views/artistas_borrar.tpl.php';
            if(file_exists($nombre_fichero_vista)){
                include($nombre_fichero_vista);
            }
        }
    }
    //Método incluir, que correspondería al CREATE del resource.
    public function incluir($params){
        //Si recibimos datos por POST quiere decir que tenemos que gestionar la inserción
        if(filter_input(INPUT_POST,'incluir',FILTER_DEFAULT)){
            //Creamos un array con las variables filtradas para pasarlo como parámetro a la función del modelo. Lo hacemos así, en lugar de acceder desde el modelo a _POST, porque de esta manera puedo utilizar el método del modelo para crear artistas en cualquier otra circunstancia
            //En primer lugar quitamos el $_POST['incluir']
            unset($_POST['incluir']);
            $args = array(
                'nombre' => FILTER_SANITIZE_STRING,
                'genero' => FILTER_SANITIZE_STRING,
                'precio_bolo' => FILTER_VALIDATE_FLOAT,
                'localidad_nacimiento' => FILTER_SANITIZE_STRING,
                'fecha_nacimiento' => FILTER_SANITIZE_STRING //TO DO: Asumimos que esta fecha es válida, pero habría que comprobarlo con lógica adicional porque no hay filtros para ello.
            );
            $artista = filter_var_array($_POST,$args);
            //Todos los campos de $artista son obligatorioas. El filtro pondra a false (o a null) aquellos campos que no cumplan el filtro. Por tanto, si hay algún campo false o null debemos lanzar una excepción que indique al usuario que no ha puesto los datos correctos.
            if(in_array(false, $artista)){
                //Los datos no eran válidos. Se mostraría mensaje al usuario indicándolo y lo remitiríamos al formulario de validación de nuevo
                //TO DO: Establecer un mensaje de error adecuado
                header('Location: ./index.php?path=artistas/listar');
            }else{
                //Instanciamos el modelo
                $nombre_fichero_model = '../app/models/artistas.php';
                if(file_exists($nombre_fichero_model)){
                    require_once($nombre_fichero_model);
                    $this->modelo = new ArtistasModel();
                    //Insertamos el artista a través del modelo.
                    $this->modelo->createArtista($artista);
                    //Redirigimos al usuario
                    header('Location: ./index.php?path=artistas');
                }
            }
            
        }else{
            //Si no hay datos en el POST, mostramos el formulario de inclusión del artista.
            //Cargo la vista
            $nombre_fichero_vista = '../app/views/artistas_incluir.tpl.php';
            if(file_exists($nombre_fichero_vista)){
                include($nombre_fichero_vista);
            }
        }
    }
}