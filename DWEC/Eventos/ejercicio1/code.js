"use strict";



let divResultado = document.querySelector("divResultado");
const btnRadio = document.querySelectorAll("[name=txtOpcion]");


    for(let radio of btnRadio){
        radio
        let opcion= radio.value();
            if(opcion == "colores"){
                divResultado.innerHTML = "azul, magenta,naranja";
            }else{
                divResultado.innerHTML = "gatos, gatitos,gatetes";
            }

    } 

