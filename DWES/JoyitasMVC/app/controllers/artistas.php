hola, se carga el controlador
<?php
class ArtistasController{
    public function listar($params){
        echo 'se ha ejecutado el método listar del controlador de artistas';
        //Cargamos el modelo    
        //TO DO
        //Sacamos los datos del modelo
        $datos = $modelo->getArtistasList();

        //Cargo la vista
        //TO DO
    
    }
}