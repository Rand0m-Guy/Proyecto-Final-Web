function validaciones() {

    // Validaciones nombres
    let nombre = document.forms["registro"]["nombre"].value;
    let apP = document.forms["registro"]["apellidoP"].value;
    let apM = document.forms["registro"]["apellidoM"].value;
    let nombresRegex = /^([A-Za-záéíóúÁÉÍÓÚ] ?)+$/;
    let nombresMatch = nombre.match(nombresRegex);
    if(nombresMatch == null || nombresMatch[0] !== nombre) {
        alert("NOMBRE INVÁLIDO");
        return false;
    }
    nombresMatch = apP.match(nombresRegex);
    if(nombresMatch == null || nombresMatch[0] !== apP) {
        alert("APELLIDO PATERNO INVÁLIDO");
        return false;
    }
    nombresMatch = apM.match(nombresRegex);
    if(nombresMatch == null || nombresMatch[0] !== apM) {
        alert("APELLIDO MATERNO INVÁLIDO");
        return false;
    }

    // REVISION CURP
    let curp = document.forms["registro"]["curp"].value;
    let curpRegex = /^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$/;

    let curpMatch = curp.match(curpRegex);

    if(curpMatch == null || curpMatch[0] !== curp) {
        alert("CURP INVÁLIDO");
        return false;
    }

    // No creo sea analizable
    // let calle = document.forms["registro"]["calle"].value;

    // NO NECESITA
    // let numExt = document.forms["registro"]["num"].value;

    // No creo sean analizables
    // let numInt = document.forms["registro"]["numInterior"].value;
    // let colonia = document.forms["registro"]["colonia"].value;

    // Revisión Código Postal
    let cp = document.forms["registro"]["cp"].value;
    let cpregex = /^\d{5}$/;
    let cpmatch = cp.match(cpregex);
    if(cpmatch == null || cpmatch[0] !== cp) {
        alert("CÓDIGO POSTAL INVÁLIDO");
        return false;
    }

    // Revisión entidad-alcaldía
    let entidad = document.forms["registro"]["entidad"].value;
    if(entidad === "ninguno") {
        alert("SELECCIONE UNA ENTIDAD");
        return false;
    }
    if(entidad != "cdmx") {
        let municipio = document.forms["registro"]["municipio"].value;
        let munRegex = /^[A-Za-z ]+$/;
        let munMatch = municipio.match(munRegex);
        if(munMatch == null || munMatch[0] !== municipio) {
            alert("MUNICIPIO INVÁLIDO");
            return false;
        }
    } else {
        let alcaldia = document.forms["registro"]["alcaldia"].value;
        if(alcaldia === "ninguno") {
            alert("SELECCIONA UNA ALCALDIA");
            return false;
        }
    }

    // CORREO Y TELÉFONO NO NECESITAN
    // let correo = document.forms["registro"]["correo"].value;
    // let telefono = document.forms["registro"]["telefono"].value;

    // Validación lugar
    let lugar = document.forms["registro"]["lugar"].value;
    if(lugar === "ninguno") {
        alert("SELECCIONE UN LUGAR");
        return false;
    }

    // Validación fecha
    let fecha = document.forms["registro"]["fecha"].value;
    var fechaARevisar = new Date(Date.parse(fecha.replace(/-/g, " ")));
    var hoy = new Date();
    if(fechaARevisar <= hoy) {
        alert("FECHA INVÁLIDA");
        return false;
    }

    // Validación hora
    let hora = document.forms["registro"]["hora"].value;
    if(hora === "ninguno") {
        alert("SELECCIONE UNA HORA");
        return false;
    }

    // Validación tipo de evento
    let tipo = document.forms["registro"]["tipo"].value;
    if(tipo === "ninguno") {
        alert("SELECCIONE TIPO DE EVENTO");
        return false;
    }
    if(tipo === "otro") {
        let eventoEspecial = document.forms["registro"]["eventootro"].value;
        let eventoEspecialRegex = /^[A-Za-z ]+$/;
        let eventoMatch = eventoEspecial.match(eventoEspecialRegex);
        if(eventoMatch == null || eventoMatch[0] !== eventoEspecial) {
            alert("EVENTO INVÁLIDO");
            return false;
        }
    }

    // NUM PERSONAS NO NECESITA
    // let numPersonas = document.forms["registro"]["numpersonas"].value;

    // Validación menu
    let menu = document.forms["registro"]["menu"].value;
    if(menu === "ninguno") {
        alert("SELECCIONE UN MENÚ");
        return false;
    }

    return true;
}