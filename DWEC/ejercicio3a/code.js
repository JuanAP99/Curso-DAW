"use strict";



let arrayCarrito = [

]


let arrProductos = [
    ["Ambientador", 1.25],
    ["Queso en lonchas", 2.80],
    ["Turrón de chocolate", 1.70],
    ["Chirimoya", 1.54],
    ["Granada", 0.48],
    ["Arroz", 1.30],
];


let opcion = document.getElementById.innerHTML("opcion");

for(let i = 0; i<arrProductos.length;i++){

    let nombre = arrProductos[i][0];
    let precio = arrProductos[i][1];

    opcion.innerHTML += `<option value="${i}">${nombre} ${precio}</option>`;
}

function rellenaCarrito() {

    let posicionProductoSeleccionado = document.getElementById('opcion').value;
    let productoSeleccionado = arrProductos[posicionProductoSeleccionado];
    
    let nombre = arrProductos[0];
    let precio = arrProductos[1];

    let cantidad = document.getElementById("txtCantidad").value;

    arrayCarrito.push([nombre,precio,cantidad]);
    
}
function verPedido(){
    
}


