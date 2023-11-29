"use stritc";

function ocultarFormularios(){

    let formularios = document.querySelectorAll(".formulario");

    formularios.forEach(function(formulario){

        formulario.classList.add("oculto");
    });
 
}
 function altaDeProducto(){

    let p;
    const listados = document.getElementById("listado");
    const idProducto = document.querySelector('[name="txtIdProducto"]').value;
    const nombre = document.querySelector('[name="txtNombre"]').value;
    const precio = document.querySelector('[name="txtPrecio"]').value;

    let tipo = document.querySelector('input[name="txtTipo"]:checked').value;
    
    if(tipo ==="movil"){

        const modelo = document.querySelector('[name="txtModelo"]').value;
        const android = document.querySelector('[name="txtAndroid"]').checked;

         p = new Movil(idProducto, nombre, precio, modelo, android);

    }else{
        const material = document.querySelector('[name="txtMaterial"]').value;
         p = new Carcasa (idProducto, nombre, precio, material);
    }


    if(almacen.altaProducto(p)){
        listados.innerHTML = '<p>Dado de alta con exito</p>';
    }else{
        listados.innerHTML = '<p>Producto ya existente, no se pudo dar de alta</p>';
    }



}
function entradaSalidaStock(){

    const id = document.querySelector('[name="txtIdProductoStock"]').value;
    const unidades = document.querySelector('[name="txtNumUnidades"]').value;
    const listados = document.getElementById("listado");
    
    if (unidades>0){
       listados.innerHTML = almacen.entradaStock(id,unidades);
    }else{
        listados.innerHTML = almacen.salidaStock(id,unidades);
    }



}
const listadoCatalogo = () =>{

    const listados = document.getElementById("listado");
    listados.innerHTML = almacen.listadoCatalogo();
  }


/* mirar el libro eloquent javascript*/
ocultarFormularios();

let almacen = new Almacen();


const btnformAlta = document.getElementById("btnFormAltaProducto");
const formAlta = document.getElementById("frmAltaProducto");
btnformAlta.addEventListener("click", ()=>{
    ocultarFormularios();
    formAlta.classList.remove("oculto");
});

const btnStock = document.getElementById("btnFormEntradaSalidaStock");
const formStock = document.getElementById("frmEntradaSalidaStock");

btnStock.addEventListener("click", ()=>{
    ocultarFormularios();
    formStock.classList.remove("oculto");
});

const btnAltaProducto = document.getElementById("btnAltaProducto");
const btnEntradaSalida = document.getElementById("btnEntradaSalidaStock");

btnAltaProducto.addEventListener("click", altaDeProducto);

btnEntradaSalida.addEventListener("click", entradaSalidaStock);


const btnListadoCatalago = document.getElementById("btnListadoCatalogo");
btnListadoCatalago.addEventListener("click", listadoCatalogo );
