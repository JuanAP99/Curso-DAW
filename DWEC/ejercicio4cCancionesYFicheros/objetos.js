class Fichero{

    constructor(nombreFichero,size){
    this.nombreFichero = nombreFichero;
    this.size = size;
    this.extension = function() {

        return 'Esta es la extensión: ';
    }
    this.getDatos = function(){

        return 'El nombre del ficher es: '+this.nombreFichero+' y su tamaño es: '+this.size;

    }
}
}

class Cancion extends Fichero{
    constructor(nombreFichero, size, nombreCancion, duracion){
        super(nombreFichero,size);
        this.nombreCancion = nombreCancion;
        this.duracion = duracion;
        this.getDatos =function(){
            return 'El nombre de la cancion es: '+this.nombreCancion+' dura: '+this.duracion+ ' su tamaño es: '+this.size;
        }
    }
}