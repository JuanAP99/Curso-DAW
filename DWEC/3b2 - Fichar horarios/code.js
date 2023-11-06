"use strict";

/////////////////////
// FUNCTIONS
/////////////////////

function fichar() {
	alert("Fichar");

	let fechaActual = Date.now();
	localStorage.fichajes.setItem("fecha",fechaActual);
}

function mostrarFichajes() {
	alert("Mostrar fichajes");
	localStorage.fichajes.getItem();
}

function resetearFichajes() {
	alert("Resetear");
	localStorage.fichajes.clear();
}

/////////////////////
// MAIN
/////////////////////

//1.- Add event Listeners
document.querySelector("#btnFichar").addEventListener("click", fichar);
document.querySelector("#btnMostrar").addEventListener("click", mostrarFichajes);
document.querySelector("#btnResetear").addEventListener("click", resetearFichajes);
