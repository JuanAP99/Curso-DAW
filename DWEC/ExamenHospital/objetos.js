"use strict";

class Hospital{
    constructor(medicos =[], citas =[]){
        this.medicos = medicos;
        this.citas = citas;
    }
    altaMedico(oMedico){
        /*Devuelve un string */

        for(const medico of this.medicos){
            if (medico.idMedico === oMedico.idMedico){

                return `Error: idMedico registrado previamente`;
            }
        }   
        this.medicos.push(oMedico);
        return `Alta de médico OK`;



    }
    altaCita(oCita){
        /*Devuelve un string */

        for(const medico of this.medicos){
            if(oCita.idMedico === medico.idMedico){
                this.citas.push(oCita);
                return `Alta de cita OK`;
            }
        }
        return `idMedico no registrado`;

    }
    listadoMedicos(){
        /*Devuelve HTMLTable */

        let s = "";
        s += `
        <table><caption>ListadoMedicos</caption>

        <tr>
            
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Colegiado</th>
            
        </tr>`;
        
        for(const medico of this.medicos){
            s += medico.toHTMLRow();
        }

  

        s+=`</table>`;

        return s;

    }
    listadoCitas(){
        /*Devuelve HTMLTable */
        let s = "";
        s += `
        <table><caption>ListadoMedicos</caption>

        <tr>
            
                <th>ID</th>
                <th>Paciente</th>
                <th>Fecha</th>
                <th>Hora</th>
            
        </tr>`;
        
        for(const cita of this.citas){
            s += cita.toHTMLRow();
        }

  

        s+=`</table>`;

        return s;
    }
}
class Medico{
    constructor(idMedico,nombre,telefono,email,colegiado){
        this.idMedico = idMedico;
        this.nombre = nombre;
        this.telefono = telefono;
        this.email = email;
        this.colegiado = colegiado;
    }
    toHTMLRow(){
        /*Devuelve una fila de una tabla */

        let s = '';

        s= `
        <tr>
            <td>${this.idMedico}</td>
            <td>${this.nombre}</td>
            <td>${this.telefono}</td>
            <td>${this.email}</td>
            <td>${this.colegiado}</td>
        
        </tr>
        
        `;
        return s;



    }
}
class Cita{
    constructor(idMedico, paciente,fecha,hora){
        this.idMedico = idMedico;
        this.paciente = paciente;
        this.fecha = fecha;
        this.hora = hora;
    }
    toHTMLRow(){
        /*Devuelve una fila de una tabla */

        let s = '';

        s= `
        <tr>
            <td>${this.idMedico}</td>
            <td>${this.paciente}</td>
            <td>${this.fecha}</td>
            <td>${this.hora}</td>
        
        </tr>
        
        `;
        return s;



    }
}