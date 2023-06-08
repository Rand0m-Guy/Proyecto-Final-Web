<?php
$nombre=$_REQUEST['nombre'];
$appat=$_REQUEST['apellidoP'];
$apmat=$_REQUEST['apellidoM'];
$curp=$_REQUEST['curp'];
$mail=$_REQUEST['correo'];
$tel=$_REQUEST['telefono'];
$calle=$_REQUEST['calle'];
$numex=$_REQUEST['num'];
$numin=$_REQUEST['interior'];
$codp=$_REQUEST['colonia'];
$colonia=$_REQUEST['cp'];
$estado=$_REQUEST['entidad'];
$municipio=$_REQUEST['municipio'];
$lugar=$_REQUEST['lugar'];
$fecha=$_REQUEST['fecha'];
$horario=$_REQUEST['hora'];
$nump=$_REQUEST['numpersonas'];
$tipo=$_REQUEST['tipo'];
$otrot=$_REQUEST['eventootro'];
$menu=$_REQUEST['menu'];


$folio=$fecha.$curp;
//variable para guardar el municipio o alcaldía en la DB
$alc_mun;
$evt;
echo "<body style='background-color:D5B5F7'>";
echo "<h1 style='display:block'>EVENTO AGENDADO</h1>";
echo "<h2><span style='color:red'>Folio: </span> $folio</h2>";
echo "<h2>Datos del evento</h2>";
echo "<b>Dirección</b><br>";
echo "<ul>";
echo "<li>Calle: $calle <br></li>";
echo "<li>Colonia: $colonia <br></li>";
echo "<li>Entidad federativa: $estado <br></li>";

//para saber si es municipio o alcaldía
if (empty($municipio)) {
	echo "<li>Alcaldía: $alcald</li>";
	$alc_mun=$alcald;
}else{
	echo "<li>Municipio: $municipio </li>";
	$alc_mun=$municipio;
}
echo "</ul>";
echo "<p><b>Fecha del evento: </b> $fecha <br>";

if($lugar=='salona')
{
	echo "Lugar del evento: Salon A <br>";
}
elseif ($lugar=='salonb') {
	echo "Lugar del evento: Salon B <br>";
}else{
	echo "Lugar del evento: $lugar <br>";
}
if(empty($otrot))
{
	echo "Tipo de evento: $tipo <br>";
}else{
	echo "Tipo de evento: $otrot <br>";
}
echo "Numero de personas: $nump <br>";
echo "Menu: $menu <br>";
echo "<h2>Datos del cliente</h2>Nombre: $nombre $appat $apmat <br>";
echo "CURP: $curp <br>";
echo "Correo: $mail <br> Telefono: $tel <br>";
echo "</body>";

?>
<a href="formulario.html"><button>Modificar</button></a>
<a href="regbd.php"><button>Confirmar</button></a>

