"use strict";

///////////////////
// FUNCTIONS
///////////////////

function ocultarFormularios(){
    const formularios = document.querySelectorAll(".formulario");

    formularios.forEach(function(formulario){
        formulario.classList.add("oculto");
    });

}
function altaMedico(){
    /*TENGO QUE RECOGER: idMedico, NOmbre, telefono,email, colegiado */

    let m;

    const idMedico = document.querySelector('[name="txtIdMedico"]').value;
    const nombre = document.querySelector('[name="txtIdMedico"]').value;
    const telefono = document.querySelector('[name="txtTelefono"]').value;
    const email = document.querySelector('[name="txtEmail"]').value;
    const colegiado = document.querySelector('[name="txtColegiado"]').value;

    m = new Medico(idMedico,nombre,telefono,email,colegiado);

    const listado = document.getElementById("listado");

    listado.innerHTML = hospital.altaMedico(m);

}
function altaCita(){

    let c;

    const idMedico = document.querySelector('[name="txtIdMedico"]').value;
    const paciente = document.querySelector('[name="txtPaciente"]').value;
    const fecha = document.querySelector('[name="txtFecha"]').value;
    const hora = document.querySelector('[name="txtHora"]').value;

    c = new Cita(idMedico, paciente, fecha, hora);

    const listado = document.getElementById("listado");

    listado.innerHTML = hospital.altaCita(c);

}

///////////////////
// MAIN
///////////////////

ocultarFormularios();
let hospital = new Hospital();

const btnMostrarFormMedico = document.getElementById("btnFormAltaMedico");
const formAltaMedico = document.getElementById("divFrmAltaMedico");
const btnMostrarFormCita = document.getElementById("btnFormAltaCita");
const formAltaCita = document.getElementById("divFrmAltaCita");

btnMostrarFormMedico.addEventListener("click", ()=>{

    ocultarFormularios();
    formAltaMedico.classList.remove("oculto");

});


btnMostrarFormCita.addEventListener("click", ()=>{
    ocultarFormularios();
    formAltaCita.classList.remove("oculto");
});


const btnAltaAceptar = document.getElementById("btnAltaMedico");
btnAltaAceptar.addEventListener("click", altaMedico);

const btnCitaAceptar = document.getElementById("btnAltaCita");
btnCitaAceptar.addEventListener("click", altaCita);

const btnMostrarListadoMedicos =  document.getElementById("btnListadoMedicos");
btnMostrarListadoMedicos.addEventListener("click", ()=>{

    const listado = document.getElementById("listado");

    listado.innerHTML= hospital.listadoMedicos();

});
const btnMostraListadoCitas = document.getElementById("btnListadoCitas");
btnMostraListadoCitas.addEventListener("click", ()=>{
    const listado = document.getElementById("listado");

    listado.innerHTML= hospital.listadoCitas();
});