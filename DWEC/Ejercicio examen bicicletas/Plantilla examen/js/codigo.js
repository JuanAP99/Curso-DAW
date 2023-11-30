"use strict";

function ocultarFormularios(){

    const formularios = document.querySelectorAll(".form-horizontal");
    formularios.forEach(function(formulario){
        formulario.classList.add("oculto");
    });
}
function altaBicicleta(){

    let b;
    const localizador = document.querySelector('[name="txtLocalizador"]').value;
    const año = document.querySelector('[name="lstAnio"]').value;
    const tipo = document.querySelector('input[name="rbtTipoBicicleta"]:checked').value;

    if(tipo === "carretera") {
        const numPlatos = document.querySelector('[name="txtPlatos"]').value;
        b = new Carretera(localizador,año,false,numPlatos);
    }else{
        const numSuspensiones = document.querySelector('[name="txtSuspensiones"]').value;
        b = new Carretera(localizador,año,false,numPlatos);
    }

    if(tienda.altaBicicleta(b)){
        alert("Alta bicicleta Ok");
        refrescarTotales();
        ocultarFormularios();

    }else{
        alert("Bicicleta registrada previamente");
        ocultarFormularios();
    }

}
function ventaBici(){

    const localizador = document.querySelector('[name="txtLocalizadorVenta"]').value;
    alert(tienda.ventaBicis(localizador));
    refrescarTotales();

}
function refrescarTotales(){

    document.querySelector("#totales").innerHTML = `
    <h3>Bicicletas de carretera: ${tienda.numCarretera()}</h3>
    <h3>Bicicletas de montaña: ${tienda.numMontaña()} </h3>
    <h3>Total de bicicletas: ${tienda.numTotal()}</h3>
    <h3>Total de ventas: ${tienda.numVenta()}</h3>
    `;
}

ocultarFormularios();
let tienda = new Tienda();


const btnAltaBici = document.getElementById("btnMostrarAlta");
const formAlta = document.querySelector('[name="frmAltaBicicleta"]');
btnAltaBici.addEventListener("click", ()=>{
    ocultarFormularios();
    formAlta.classList.remove("oculto");
});

const btnFormAlta = document.querySelector('[name="btnAltaBicicleta"]');
btnFormAlta.addEventListener("click", altaBicicleta);


const btnVentaBici = document.querySelector('[name="btnMostrarVenta"]');
const formVentaBici = document.querySelector('[name="frmVentaBicicleta"]');
btnVentaBici.addEventListener("click", ()=>{
    ocultarFormularios();
    formVentaBici.classList.remove("oculto");
});

const btnFormVentaBici = document.querySelector('[name="btnVentaBicicleta"]');

btnFormVentaBici.addEventListener("click",ventaBici);

const btnMostrarTotales = document.querySelector('[name="btnMostrarTotales"]');
btnMostrarTotales.addEventListener("click", refrescarTotales);