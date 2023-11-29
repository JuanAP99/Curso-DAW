"use strict";

class Almacen{ 
    constructor( catalogo = [], stock = []){

        this.catalogo=catalogo;
        this.stock=stock;
    }
    altaProducto(oProducto){
        /* Devuelve un booleano si ha dado de alta o no  */ 

        for(const producto of this.catalogo){

            if(producto.id === oProducto.id){
                return false;
            }
            
        }
        this.catalogo.push(oProducto);
        return true;
    }
    entradaStock(idProducto,unidades){

        let flag;
        let s = new StockProducto(idProducto,unidades);

        for(const producto of this.catalogo){

          if (producto.id === idProducto){
            flag = true;
            break;
          }else{
            flag=false;
          }
        }
        if(flag){
            this.stock.push(s);
            return "Stock actualizado con exito";
        }

        return "No se ha podido actulizar producto no existente";


    }
    salidaStock(idProducto,unidades){
        let flag;
        let s = new StockProducto(idProducto,unidades);

        for(const producto of this.stock){

          if (producto.idProducto === idProducto){
            flag = true;
            this.stock.push(s);
            break;
          }else{
            flag=false;
            break;
          }
        }
        if(flag){
            return "Stock actualizado con exito";
        }

        return "No se ha podido actulizar producto no existente";
    }
    listadoCatalogo(){
        /* Devuelve una tabla html */ 

        let markup ="";
        markup += `<table><caption>Listado Catalogo </caption>`;
        markup += '<thead><tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Android/Material</th></tr></thead>';
        
        for(const producto of this.catalogo){

            

            markup += producto.toHTMLRow();
        }

        
        markup += `</table>`;
        return markup;
    }
    listadoStock(){
        /* Devuelve una tabla html */ 

        let markup ="";
        markup += `<table><caption>Stock Moviles </caption>`;
        markup += '<thead><tr><th>ID</th><th>Stock total</th></tr></thead>';
        let contM = 0;
        let contC = 0;
        const arrMoviles = this.catalogo.filter(p => p instanceof Movil);

        for (const movil of arrMoviles){
            contM = 0;
            for (const producto of this.catalogo){
                if(producto.id === movil.id){
                    contM += this.stock.unidades;
                }
                markup += `<tr><td>${movil.id}</td><td>${contM}</td></tr>`;
            }
            
            
           
        }

        const arrCarcasa = this.catalogo.filter(p => p instanceof Carcasa);

        markup += `<table><caption>Stock Carcasas </caption>`;
        markup += '<thead><tr><th>ID</th><th>Stock total</th></tr></thead>';

        contC = 0;
        for (const carcasa of arrCarcasa){
            for (const producto of this.catalogo){
                if(producto.id === carcasa.id){
                    contC += this.stock.unidades;
                }
                markup += `<tr><td>${carcasa.id}</td><td>${contM}</td></tr>`;
            }

        }

        return markup;

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

        return `<tr><td>${this.idProducto}</td><td>${this.unidades}</td></tr>`;

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

        return `<tr><td>${this.id}</td><td>${this.nombre}</td><td>${this.precio}</td><td>${this.android}</td></tr>`;
    }
}
class Carcasa extends Producto{
    constructor(id,nombre,precio,material){
        super(id,nombre,precio);
        this.material=material;
    }
    toHTMLRow(){
        /* Devuelve una fila de una tabla */ 

        return `<tr><td>${this.id}</td><td>${this.nombre}</td><td>${this.precio}</td><td>${this.material}</td></tr>`;
    }
}