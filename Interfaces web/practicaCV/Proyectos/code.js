"use strict";

const nav = document.querySelector(".nav-links");
const abrir = document.querySelector(".menu-toggle .botonOculto");
const cerrar = document.querySelector(".cerrar-menu");


abrir.addEventListener("click", ()=>{
    nav.classList.toggle("visible");
});
