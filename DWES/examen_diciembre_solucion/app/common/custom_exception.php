<?php 

class CustomException  extends PDOException {
    private $mensaje;
    public function __construct($mensaje){
        $this->mensaje = $mensaje;
        parent::__construct();
    }
    public function getCustomMessage(){
        return $this->mensaje;
    }
    public function setCustomMessage($mensaje){
        $this->mensaje = $mensaje;
    }

}