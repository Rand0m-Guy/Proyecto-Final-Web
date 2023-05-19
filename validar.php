<?php
$nombre=$_REQUEST['ncompleto'];
$rfc=$_REQUEST['rfc'];
$calle=$_REQUEST['calle'];
$numex=$_REQUEST['num'];
$numin=$_REQUEST['interior'];
$codp=$_REQUEST['colonia'];
$colonia=$_REQUEST['cp'];
$estado=$_REQUEST['entidad'];
$municipio=$_REQUEST['municipio'];
$fecha=$_REQUEST['fecha'];
$alcald=$_REQUEST['alcaldia'];
$mail=$_REQUEST['correo'];
$tel=$_REQUEST['telefono'];
$lugar=$_REQUEST['lugar'];
$tipo=$_REQUEST['tipo'];
$otrot=$_REQUEST['eventootro'];
$nump=$_REQUEST['numpersonas'];
$menu=$_REQUEST['menu'];
echo "<h1>EVENTO AGENDADO</h1>";
echo "<h2>Datos del cliente</h2>Nombre: $nombre <br>";
echo "RFC: $rfc <br>";

echo "<h2>Direccion</h2>";
echo "Calle: $calle <br>";
echo "Colonia: $colonia <br>";
echo "Entidad federativa: $estado <br>";
if (empty($municipio)) {
	echo "Alcaldía: $alcald";
}else{
	echo "Municipio: $municipio";
}


echo "<h3>Medios de contacto del cliente</h3>";
echo "Correo: $mail <br> Telefono: $tel <br>";




echo "<h2>Datos del evento</h2>";
echo "<p><b>Fecha del evento: </b> $fecha <br>";

if($lugar=='salona')
{
	echo "Lugar del evento: Salon A <br>";
}
elseif ($lugar=='salonb') {
	echo "Lugar del evento Salon B <br>";
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
?>