"use strict";

///////////////////
// FUNCTIONS
///////////////////

function ocultarFormulario(){

    let formularios = document.querySelectorAll(".formulario");
    formularios.forEach(function(formulario) {
        formulario.classList.add("oculto");
    });
}
const darAltaProducto = () =>{

    const idProd =  Number(document.querySelector('[name="txtIdProducto"]').value);
    const nomProd = document.querySelector('[name="txtNombre"]').value;
    const precioProd = Number(document.querySelector('[name="txtPrecio"]').value);

    let tipo = document.querySelector('[name="txtTipo"]:checked').checked;
    let p;

    if(tipo === "movil"){

        const modelo = document.querySelector('[name="txtModelo"]').value;
        const android = document.querySelector('[name="txtAndroid"]:checked').checked;

        p = new Movil(idProd,nomProd,precioProd,modelo,android);

    }else{

        const material = document.querySelector('[name="txtMaterial"]').value;
        p = new Carcasa(idProd,nomProd,precioProd,material);

    }

    const divListado = document.getElementById("listado");

    if (almacen.altaProducto(p)){
        divListado.innerHTML = `<p> El producto ${nomProd} ha sido añadido</p>`;
    }else{
        divListado.innerHTML = `<p>El producto ${nomProd} no se ha podido añadir ya existe</p>`;
    }
    


}

const entradaSalidaStock = () =>{

    let m = '';
    const idProductoStock = document.querySelector('[name="txtIdProductoStock"]').value;
    const txtNumUnidades = Number(document.querySelector('[name="txtNumUnidades"]').value);

    if (txtNumUnidades < 0){
        m = almacen.salidaStock(idProductoStock, txtNumUnidades);
        
    }else{
       m =  almacen.entradaStock(idProductoStock, txtNumUnidades);
    }

    document.querySelector("listado").innerHTML = m;
}
    

    



///////////////////
// MAIN
///////////////////

ocultarFormulario();

/* Parte de dar alta en almacen */


let almacen = new Almacen();
    
const formularioAlta = document.getElementById("frmAltaProducto");
const btnFormAlta = document.getElementById("btnFormAltaProducto");
btnFormAlta.addEventListener("click", () =>{
    ocultarFormulario();
    formularioAlta.classList.remove("oculto");
});
const btnEntrada = document.getElementById("btnFormEntradaSalidaStock");
const frmEntradaSalidaStock = document.getElementById("frmEntradaSalidaStock");
btnEntrada.addEventListener("click", () =>{
    ocultarFormulario();
    frmEntradaSalidaStock.classList.remove("oculto");
});