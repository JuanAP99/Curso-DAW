function Perro(nombre,raza,edad){

    this.nombre = nombre,
    this.raza = raza,
    this.edad = edad
    this.mostrarDatos = function(){
        return `Su nombre es: `+this.nombre+`, su raza es: `+$this.raza+' y su edad es: '+this.edad;
    }
}