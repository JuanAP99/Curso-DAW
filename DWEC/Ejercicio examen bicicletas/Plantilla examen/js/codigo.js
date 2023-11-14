"use stritc";
/* .d-none clase para ocultar cosas en boostrap */

//////////////////
//// Functions
//////////////////

const ocultarFormularios = () =>{
    document.querySelectorAll("form").forEach(
        formulario => formulario.classList.add("oculto")
    );
}



////////////////
//// Main 
////////////////


ocultarFormularios();