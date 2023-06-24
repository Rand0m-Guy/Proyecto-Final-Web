// Cambia de municipio a alcaldía
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


// Cambia tipo de evento

var tipoEvento = document.getElementById("tipo");

function onChangeTipo() {
    console.log("Caso base");
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

var fechaEvento = document.getElementById("fecha");
var lugarEvento = document.getElementById("lugar");

// Pone horarios dependiendo del día de la semana
function onChangeFecha() {
    var horaEvento = document.getElementById("hora");
    var fechaARevisar = new Date(Date.parse(fechaEvento.value.replace(/-/g, " ")));
    if(fechaEvento.value == null) {
        console.log("NULLL");
        return;
    }
    if(fechaEvento.value.length == 0) {
        console.log("NADAAA");
        return;
    }
    let dia = fechaARevisar.getDay();
    console.log(fechaEvento);
    console.log(horaEvento);
    console.log(fechaARevisar);
    console.log(dia);

    while(horaEvento.childElementCount !== 1) {
      horaEvento.removeChild(horaEvento.children[1]);
    }

    horaEvento.value = "ninguno";
    if(lugarEvento.value === "ninguno") return;

    if(dia === 0 && lugarEvento.value === "jardin") {
        var opt = document.createElement('option');
        opt.value = "9am - 2pm";
        opt.innerHTML = "9am - 2pm";
        horaEvento.appendChild(opt);
    }

    if(dia < 5) {
        return;
    }

    if(dia === 5 && lugarEvento.value !== "jardin") {
        var opt1 = document.createElement('option');
        opt1.value = "12pm - 5pm";
        opt1.innerHTML = "12pm - 5pm";
        horaEvento.appendChild(opt1);
        var opt2 = document.createElement('option');
        opt2.value = "7pm - 12am";
        opt2.innerHTML = "7pm - 12am";
        horaEvento.appendChild(opt2);
        return;
    }
    if(lugarEvento.value === "jardin") return;

    var opt3 = document.createElement('option');
    opt3.value = "2pm - 7pm";
    opt3.innerHTML = "2pm - 7pm";
    horaEvento.appendChild(opt3);
}

fechaEvento.onchange = onChangeFecha;
lugarEvento.onchange = onChangeFecha;
onChangeFecha();