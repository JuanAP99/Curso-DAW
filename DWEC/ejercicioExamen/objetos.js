"use strict";

class Almacen{
    constructor(catalogo,stock){
        this.catalogo = catalogo;
        this.stock = stock;
    }
    altaProducto(oProducto){

        let esta = false;
        
        for(this.catalogo of producto){

            if( producto == oProducto.nombre){
                esta= true;
            }else{
                esta = false;
            }
        }
        return esta;
    }
    entradaStock(idProducto, unidades){

        for(this.stock of productoEnStock){

            if(idProducto != productoEnStock.idProducto){

        }
    }
    salidaStock(idProducto, unidades){
        
    }
    listadoCatalogo(){
        /* return htmlTable  */ 
    }
    listadoStock(){
        /* return htmlTable  */ 
    }
    numCarcasaStock() {
        /* Devuelve un number */
    }
    importeTotalStock(){

    }
}


class StockProducto{
    constructor(idProducto, unidades){
        this.idProducto = idProducto;
        this.unidades = unidades;
    }
    toHTMLRow(){

    }
}
class Producto{
    constructor(id,nombre,precio){
        this.id = id;
        this.nombre = nombre;
        this.precio;
    }
    toString(){

    }
}
class Movil extends Producto{
    constructor(id,nombre,precio,modelo,android){
        super(id,nombre,precio);
        this.modelo = modelo;
        this.android = android;
    }
}
class Carcasa extends Producto{
    constructor(id,nombre,precio,material){
        super(id,nombre,precio);
        this.material =  material;
    }
}