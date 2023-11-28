"use strict";

class Almacen{ 
    constructor(catalago = [], stock = []){
        this.catalogo=catalogo;
        this.stock=stock;
    }
    altaProducto(oProducto){
        /* Devuelve un booleano si ha dado de alta o no  */ 

    }
    entradaStock(idProducto,Unidades){

    }
    salidaStock(idProducto,unidades){

    }
    listadoCatalogo(){
        /* Devuelve una tabla html */ 
    }
    listadoStock(){
        /* Devuelve una tabla html */ 
    }
    numCarcasasStock(){
        /* Devuelve un numero */ 
    }
    importeTotalStock(){
        /* Devuelve un numero */ 
    }
}

class StockProducto{
    constructor(idProducto,unidades){
        this.idProducto = idProducto;
        this.unidades = unidades;
    }
    toHTMLRow(){
        /* Devuelve una fila html con los datos */ 
    }
}
class Producto{
    constructor(id,nombre,precio){
        this.id = id;
        this.nombre = nombre;
        this.precio = precio;
    }
    toString(){
        /* Devuelve un String */ 
    }
}
class Movil extends Producto{
    constructor(id,nombre, precio,modelo,android){
        super(id,nombre,precio);
        this.modelo = modelo;
        this.android = android;
    }
    toHTMLRow(){
        /* Devuelve una fila de una tabla html */ 
    }
}
class Carcasa extends Producto{
    constructor(id,nombre,precio,material){
        super(id,nombre,precio);
        this.material=material;
    }
    tohtmlRow(){
        /* Devuelve una fila de una tabla */ 
    }
}