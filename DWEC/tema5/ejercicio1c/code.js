"use stritc";

const btnCambiarColor = document.querySelector(".cambiaColor");
const botones = document.querySelectorAll("button");

btnCambiarColor.addEventListener("click", e=>{
    document.styleSheets[0].cssRules[2].style.backgroundcolor="#47adad";
});