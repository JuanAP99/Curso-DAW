"use strict";

function calculaLaMedia(...resto){
    
    let suma = 0;
     for(let num of resto){
        suma+=num;
     }
     return suma/resto.length;

}

