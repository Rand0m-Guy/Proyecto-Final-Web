var entidad = document.getElementById("entidad");

function onChange() {
    var value = entidad.value;

    var municipioTxt = document.getElementById("municipiotxt");
    var municipio = document.getElementById("municipio");
    var alcaldiaTxt = document.getElementById("alcaldiatxt");
    var alcaldia = document.getElementById("alcaldia");

    if(value == "ninguno") {
        alcaldiaTxt.style.display = "none";
        alcaldia.style.display = "none";
        municipio.style.display = "none";
        municipioTxt.style.display = "none";

        alcaldia.value = "ninguno";
        municipio.value = "";
        return;
    }

    if(value == "cdmx") {
        alcaldiaTxt.style.display = "block";
        alcaldia.style.display = "block";
        municipio.style.display = "none";
        municipioTxt.style.display = "none";

        alcaldia.value = "ninguno";
        municipio.value = "";
        return;
    }

    alcaldiaTxt.style.display = "none";
    alcaldia.style.display = "none";
    municipio.style.display = "block";
    municipioTxt.style.display = "block";

    alcaldia.value = "ninguno";
    municipio.value = "";
}

entidad.onchange = onChange;
onChange();




var tipoEvento = document.getElementById("tipo");

function onChangeTipo() {
    var value = tipoEvento.value;

    var otroTxt = document.getElementById("eventootrotxt");
    var otro = document.getElementById("eventootro");

    if(value == "otro") {
        otroTxt.style.display = "block";
        otro.style.display = "block";
        return;
    }

    otroTxt.style.display = "none";
    otro.style.display = "none";
    otro.value="";
}

tipoEvento.onchange = onChangeTipo;
onChangeTipo();