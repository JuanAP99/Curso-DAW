<?php
class InicioController{

    public function home(){
        //Cargo la vista
        $nombre_fichero_vista = '../app/views/inicio.tpl.php';
        if(file_exists($nombre_fichero_vista)){
            include($nombre_fichero_vista);
        }
    }
}
?> 