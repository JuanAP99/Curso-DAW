"use strict";



function add(){

    let nombre = document.documentElementById("txtNombre").value;
    let raza = document.documentElementById("txtRaza").value;
    let edad = document.documentElementById("txtEdad").value;

    const p = new Perro(nombre,raza,edad);

    arrayPerros.push(p);

}
function ordenaPorInsercion(){
    
}


let arrayPerros=[];

let btnAdd = document.querySelector("#btnAdd");

btnAdd.addEventListener("click", add);



