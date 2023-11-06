"use, strict";

let cadenaACamelizar = "En-un-lugar-de-la-mancha";

cadenaACamelizar.split("-").map((palabra,i)=>{

    if(i==0)
        return palabra.toLowerCase();

    return
    palabra[0].toUpperCase()+palabra.slice(1).toLowerCase();
}).join("");

