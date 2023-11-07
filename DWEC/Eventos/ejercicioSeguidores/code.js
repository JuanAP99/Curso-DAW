"use strict";

const fs = require(fs);
const jsonData = fs.readFileSync('seguidores.json', 'utf-8');
let tabla  = document.querySelector("#tabla");

const data = JSON.parse(jsonData);

data.array.forEach(element => {
    tabla.innerHTML = `<tr>`;
    tabla.innerHTML = `<td>${element}</td>`;
    tabla.innerHTML = `<td>${element}</td>`;
    tabla.innerHTML = `</tr>`;
});