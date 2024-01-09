"use stritc";



///////////////////
//// Funciones
//////////////////

function iniciarHTML(){
    
    divResultadoHTML.innerHTML = "Cargando ....";
    fetch("https://mocktarget.apigee.net/iloveapis")
    .then(response => {
        // Verificar si la solicitud fue exitosa (código de respuesta 200..299)
        if (!response.ok) {
          throw new Error('Error de red o servidor');
        }
        // Convertir la respuesta a formato JSON con response.json() o texto
        return response.text();
      })
      .then(data => {
        // Hacer algo con los datos
        divResultadoHTML.innerHTML = "";
        console.log(data);
        
        data.split("\n").forEach(e => {divResultadoHTML.innerHTML += "<p>" + e + "</p>"});
      })
      .catch(error => {
        // Manejar errores
        console.error('Hubo un problema con la solicitud: ', error);
        divResultado.innerHTML = "Hubo un problema con la solicitud: "+error;
      });
    }

async function iniciarJSON(){
    divResultadoJSON.innerHTML = "Carga vera carga....";
    const data = await trataJSON("https://mocktarget.apigee.net/json");

    divResultadoJSON.innerHTML = "";
    console.log(data);
    data.forEach(e => {divResultadoJSON.iniciarHTML += `<p>${e.firstName} ${e.lastName}</p>`})
}

async function trataJSON(fichero) {
    const response = await fetch(fichero);
    const data = await response.json();
    return data;
 }



////////////////
/////  Main  
///////////////
let divResultadoHTML = document.getElementById("divResultadoHTML");
iniciarHTML();

let divResultadoJSON = document.getElementById("divResultadoJSON");
iniciarJSON();