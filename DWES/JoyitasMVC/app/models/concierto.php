<?php

class Concierto {
    private $id;
    private $fecha;
    private $lugar;
    private $artista;

    public function __construct($id, $fecha, $lugar, $artista) {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->lugar = $lugar;
        $this->artista = $artista;
    }

    public function getId() {
        return $this->id;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getLugar() {
        return $this->lugar;
    }

    public function getArtista() {
        return $this->artista;
    }

    

}

?>
