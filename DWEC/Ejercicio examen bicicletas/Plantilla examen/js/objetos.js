"use strict";

class Tienda{
    constructor(tBicis = [],numVentas){
        this.tBicis = tBicis;
        this.numVentas = numVentas;
    }
    altaBicicleta(oBici){
        /* Devuelve un booleano */

        for(const bici of this.tBicis){

            if(bici.localizador === oBici.localizador){
                return false;
            }
        }
        this.tBicis.push(oBici);
        return true;
    }
    ventaBicis(sLocalizador){
        /* Devuelve un String */

        for (const bici of this.tBicis){
            if(bici.localizador === sLocalizador){
                if(bici.vendida){
                    return 'Bicicleta ya vendida';
                }else{
                    bici.vendida = true;
                    return 'Bicicleta vendida';
                }
            }
        }
        return 'Bicicleta no registrada';

    }
    listadoCarretera(){
        /* Devuelve HTMLTable */
    }
    listadoGeneral(){
        /* Devuelve HTMLTable */
    }
    numCarretera() {
        return this.tBicis.filter(b => b instanceof Carretera).length
      }
      numMontaña() {
        return this.tBicis.filter(b => b instanceof Montaña).length
      }
      numTotal() {
        return this.tBicis.length
      }
      numVenta() {
        return this.tBicis.filter(b => b.vendida).length
      }

}
class Bicicleta{
    constructor(localizador, año, vendida){
        this.localizador = localizador;
        this.año = año;
        this.vendida = vendida;
    }
    toHTMLRow(){

    }
}
class Carretera extends Bicicleta{
    constructor(localizador, año, vendida, numPlatos){
        super(localizador,año,vendida);
        this.numPlatos = numPlatos;
    }
    toHTMLRow(){

    }
}
class Montaña extends Bicicleta{
    constructor (localizador,año,vendida,numSuspensiones){
        super(localizador,año,vendida);
        this.numSuspensiones = numSuspensiones;
    }
}