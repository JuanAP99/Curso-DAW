"use strict"

class Tienda{
    constructor(tBicis=[], numVentas){
        this.tBicis = tBicis;
        this.numVentas = numVentas;
    }
    altaBicicleta(OBici){

    }
    ventaBici(sLocalizador){
        
    }
    listadoCarretera(){
        
    }
    listadoMontania(){
        
    }
    listadoGeneral(){
        
    }
    numCarretera(){
        
    }
    numMontaña(){
        
    }
    numTotal(){
        
    }
    numVenta(){
        
    }   
}
class Bicicleta{
    constructor(localizador, año, vendida){
        this.localizador = localizador;
        this.año = año;
        this.vendida = vendida;
    }toHTMLrow(){

    }
} 
class Carretera extends Bicicleta{
    constructor(localizador, año, vendida, numPlatos){
        super(localizador, año, vendida);
        this.numPlatos = numPlatos;
    }toHTMLrow(){

    }
}
class Montaña extends Bicicleta{
    constructor(localizador, año, vendida, numSuspensiones){
        super(localizador, año, vendida);
        this.numSuspensiones = numSuspensiones;
    }
    toHTMLrow(){

    }
}

    
    
