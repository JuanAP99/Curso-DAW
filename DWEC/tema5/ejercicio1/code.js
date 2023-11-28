"use strict";

const texto = document.getElementById("txt");
const cont = document.querySelector(".cont");

texto.addEventListener("keyup", function(){

    cont.innerHTML = `<p>untexto</p>`; 
});

