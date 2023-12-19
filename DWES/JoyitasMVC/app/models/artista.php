<?php 
class Artista {
    // Propiedades
    private $id;
    private $nombre;
    private $genero;
    private $fechaNacimiento;
    private $precioBolo;
    private $localidadNacimiento;

    // Constructor
    public function __construct($id, $nombre, $genero, $fechaNacimiento, $precioBolo, $localidadNacimiento) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->genero = $genero;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->precioBolo = $precioBolo;
        $this->localidadNacimiento = $localidadNacimiento;
    }

    // Métodos de acceso
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    public function getPrecioBolo() {
        return $this->precioBolo;
    }

    public function getLocalidadNacimiento() {
        return $this->localidadNacimiento;
    }

    // Métodos de modificación
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    public function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function setPrecioBolo($precioBolo) {
        $this->precioBolo = $precioBolo;
    }

    public function setLocalidadNacimiento($localidadNacimiento) {
        $this->localidadNacimiento = $localidadNacimiento;
    }
}

?>