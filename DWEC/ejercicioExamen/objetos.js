"use strict";

class Almacen{
    constructor(){
        this.catalogo = [];
        this.stock = [];
    }
    altaProducto(oProducto){

        let m = '';

        this.catalogo.forEach(function(producto){

            if(producto.id === oProducto.id){
                return false;
            }
        });

        this.catalago.push(oProducto);
       
        return true;
    }
    entradaStock(idProducto, unidades){

        let exsiste = false;
        for(const producto of this.stock){
            if (producto.idProducto === idProducto){
                    exsiste = true;
                    
                    break;
            }
        }
        if(exsiste){
            oStock = new Stock (idProducto, unidades);
            almacen.stock.push(oStock);
            return `Stock actualizado con éxito.`;
        }else{
            return "No se encuentra el id del producto en el stock";
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