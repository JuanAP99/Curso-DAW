"use strict";

let divTexto = document.querySelector("#divTexto .menu");
let menu = document.querySelector("menu oculto");

divTexto.addEventListener("change", (e)=>{

    menu.classList.toggle(".oculto");
})

