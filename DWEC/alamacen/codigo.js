"use stritc";

function ocultarFormularios(){

    let formularios = document.querySelectorAll(".formulario");

    formularios.forEach(function(formulario){

        formulario.classList.add("oculto");
    });
 
}
function altaDeProducto(){

    

}


/* mirar el libro eloquent javascript*/
ocultarFormularios();

const btnformAlta = document.getElementById("btnFormAltaProducto");
const formAlta = document.getElementById("frmAltaProducto");
btnformAlta.addEventListener("click", ()=>{
    ocultarFormularios();
    formAlta.classList.remove("oculto");
});

const btnStock = document.getElementById("btnFormEntradaSalidaStock");
const formStock = document.getElementById("frmEntradaSalidaStock");

btnStock.addEventListener("click", ()=>{
    ocultarFormularios();
    formStock.classList.remove("oculto");
});