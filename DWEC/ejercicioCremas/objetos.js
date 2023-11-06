"use strict";

function Crema(nombre,precio,marca,){
    this.nombre = nombre,
    this.precio = precio,
    this.marca = marca,
    this.arrIngredientes = [],
    this.addIngrediente(nombre,cantidad) = function (){

        const i = new Ingrediente(nombre,cantidad);

        arrIngredientes.push(i);
    
    },
    this.toHTMLTable()=function(){

        let tablaEntera = '<table>';

        tablaEntera += `<tr><th> ${this.nombre} </th> <th> ${this.marca} </th> </tr>`;

        for(let ing in this.arrIngredientes){
            tablaEntera+=ing.toHTMLRow();
        }

        tablaEntera += '</table>';

        return tablaEntera;
    }
}
function Ingrediente(nombre, cantidad){
    this.nombre = nombre;
    this.cantidad = cantidad;
    this.toHTMLRow()=function (){
        return `<tr><td> ${nombre} </td><td> ${cantidad}</td></tr>`
    } 
}