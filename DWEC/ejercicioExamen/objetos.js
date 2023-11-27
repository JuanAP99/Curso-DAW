"use strict";

class Almacen{
    constructor(catalago=[],stock=[]){
        this.catalogo = catalago; 
        this.stock = stock;
    }
    altaProducto(oProducto){
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
    listadoCatalogo(){
        /* return htmlTable  */ 

        let tabla =

        tabla += '<table><caption>Listado catálogo</caption>';
        tabla += '<thead><tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Android/Material</th></tr></thead>';
        

        for(this.catalogo of producto){

           tabla += `${producto.toHTMLRow()}`;

        }


        tabla += '</table>';

        return tabla;

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
        return `<tr><td>${this.idProducto}</td><td>${this.unidades}</td></tr>`;
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

  

    toHTMLRow(){
        let and = "No android";
        if(this.android) and="Android";
        return `<tr><td>${this.id}</td><td>${this.nombre}</td><td>${this.precio}</td><td>${and}</td></tr>`;
    }

}
class Carcasa extends Producto{
    constructor(id,nombre,precio,material){
        super(id,nombre,precio);
        this.material =  material;
    } 
       toHTMLRow(){
        return `<tr><td>${this.id}</td><td>${this.nombre}</td><td>${this.precio}</td><td>${this.material}</td></tr>`;
    }
}