<?php
if ( !($_GET['function']='add' && $_GET['id_pag'])){
	header("Location: ../html/Principal.html");
	exit;
}
$nombre=$_REQUEST['nombre'];
$appat=$_REQUEST['apellidoP'];
$apmat=$_REQUEST['apellidoM'];
$curp=$_REQUEST['curp'];
$mail=$_REQUEST['correo'];
$tel=$_REQUEST['telefono'];
$calle=$_REQUEST['calle'];
$numex=$_REQUEST['num'];
$numin=$_REQUEST['interior'];
$codp=$_REQUEST['cp'];
$colonia=$_REQUEST['colonia'];
$estado=$_REQUEST['entidad'];
$municipio=$_REQUEST['municipio'];
$alcald=$_REQUEST['alcaldia'];
$lugar=$_REQUEST['lugar'];
$fecha=$_REQUEST['fecha'];
$horario=$_REQUEST['hora'];
$nump=$_REQUEST['numpersonas'];
$tipo=$_REQUEST['tipo'];
$otrot=$_REQUEST['eventootro'];
$menu=$_REQUEST['menu'];
$evt;
$opmenu;
$place;
$fotolugar;
//hashmaps para convertir a nombres correctos

	 $estados=array('aguascalientes'=>'Aguascalientes','bajacalifornia'=>'Baja California','bajacaliforniasur'=>'Baja California Sur','campeche'=>'Campeche','chiapas'=>'Chiapas','chihuahua'=>'Chihuahua','cdmx'=>'CDMX','coahuila'=>'Coahuila','colima'=>'Colima','durango'=>'Durango','guanajuato'=>'Guanajuato','guerrero'=>'Guerrero','hidalgo'=>'Hidalgo','jalisco'=>'Jalisco','edomex'=>'Estado de México','michoacan'=>'Michoacán','morelos'=>'Morelos','nayarit'=>'','nuevoleon'=>'Nuevo León','oaxaca'=>'Oaxaca','puebla'=>'Pueba','queretaro'=>'Querétaro','quintanaroo'=>'Quintana Roo','sanluispotosi'=>'San Luis Potosí','sinaloa'=>'Sinaloa','sonora'=>'Sonora','tabasco'=>'Tabasco','tamaulipas'=>'Tamaulipas','tlaxcala'=>'Tlaxcala','veracruz'=>'Veracruz','yucatan'=>'Yucatán','zacatecas'=>'Zacatecas');

    $alcaldias = array('alvaroobregon' =>'Álvaro Obregón','azcapotzalco' =>'Azcapotzalco','bj' =>'Benito Juárez','coyoacan' =>'Coyoacán','cuajimalpa' =>'Cuajimalpa','cuauhtemoc' =>'Cuauhtémoc','madero' =>'Gustavo A. Madero','iztacalco' =>'Iztacalco','iztapalapa' =>'Iztapalapa','mcontreras' =>'Magdalena Contreras','hidalgo' =>'Miguel Hidalgo','malta' =>'Milpa Alta','tlahuac' =>'Tláhuac','tlalpan' =>'Tlalpan','carranza' =>'Venustiano Carranza','xochimilco' =>'Xochimilco' );

    $eventos  = array('bautizo' =>'Bautizo' ,'comunion' =>'Primera Comunión' ,'quince' =>'XV Años' ,'boda' =>'Boda' ,'cumple' =>'Cumpleaños' ,'otro' =>'Otro'  );
    $lugares = array('salona' => 'Salón A','salonb' =>'Salón B' ,'jardin' =>'Jardín');
    $menus = array('economico'=>'Económico','ejecutivo'=>'Ejecutivo');
/*
//Variables para almacenar la hora de inicio y fin
$horainicio=substr($horario, 0, 2);
$horafin=substr($horario, -2);
*/


$folio=$curp.$fecha;
//variable para guardar el municipio o alcaldía en la DB
$alc_mun;
$evt;
echo "<body style='background-color:D5B5F7'>";
echo "<h1 style='display:block'>EVENTO AGENDADO</h1>";
echo "<h2><span style='color:red'>Folio: </span> $folio</h2>";
echo "<h2>Datos del evento</h2>";
echo "<p><b>Fecha del evento: </b> $fecha <br>";
echo "Hora de inicio: ".$horario. "<br>";

if($menu=='ejecutivo')
{
	$opmenu="Ejecutivo";
}else{
	$opmenu="Económico";
}
if($lugar=='salona')
{
	$place="Salón A";
	echo "Lugar del evento: Salón A <br>";
	$fotolugar="salon1-0.jpg";
}
elseif ($lugar=='salonb') {
		$place="Salón B";
		$fotolugar="salon2-2.jpg";
	echo "Lugar del evento: Salón B <br>";
}else{
	echo "Lugar del evento: $lugar <br>";
	$place="Jardín";
	$fotolugar="jardin-0.jpg";
}
if(empty($otrot))
{
		switch($tipo)
	{
		case "cumple":
			$evt="Cumpleaños";
			break;
		case "bautizo":
			$evt="Bautizo";
			break;
		case "comunion":
			$evt="Primera Comunión";
			break;
		case "boda":
			$evt="Boda";
			break;
		case "quince":
			$evt="XV años";
			break;
	}
}else{
	$evt=$otrot;
}
echo "Numero de personas: $nump <br>";
echo "Menu: $menus[$menu] <br>";
echo "<h2>Datos del cliente</h2>Nombre: $nombre $appat $apmat <br>";
echo "<b>Dirección</b><br>";
echo "<ul>";
echo "<li>Calle: $calle <br></li>";
echo "<li>Colonia: $colonia <br></li>";
echo "<li>Entidad federativa: $estados[$estado] <br></li>";

//para saber si es municipio o alcaldía
if (empty($municipio)) {
	echo "<li>Alcaldía: $alcaldias[$alcald]</li>";
	$alc_mun=$alcald;
}else{
	echo "<li>Municipio: $municipio </li>";
	$alc_mun=$municipio;
}
echo "</ul>";
echo "CURP: $curp <br>";
echo "Correo: $mail <br> Telefono: $tel <br>";
echo "</body>";
session_start();

//Sesiones para traslado a BD
$_SESSION['folio']=$folio;
$_SESSION['nombre']=$nombre;
$_SESSION['ap']=$appat;
$_SESSION['am']=$apmat;
$_SESSION['curp']=$curp;
$_SESSION['mail']=$mail;
$_SESSION['tel']=$tel;
$_SESSION['calle']=$calle;
$_SESSION['nex']=$numex;
$_SESSION['nin']=$numin;
$_SESSION['col']=$colonia;
$_SESSION['cop']=$codp;
$_SESSION['entidad']=$estados[$estado];
$_SESSION['alcmun']=$alc_mun;
$_SESSION['lugarpf']=$place;
$_SESSION['lugar']=$lugar;
$_SESSION['date']=$fecha;
$_SESSION['hora']=$horario;
$_SESSION['tipo']=$evt;
$_SESSION['np']=$nump;
$_SESSION['menu']=$opmenu;
$_SESSION['lugarimg']=$fotolugar;
$_SESSION['municipio']=$municipio;
$_SESSION['alcaldia']=$alcaldias[$alcald];
$_SESSION['menu']=$menus[$menu];
$_SESSION['tipod']=$tipo;
$_SESSION['otrotipo']=$otrot;
?>
<a href="modreg.php">
	<button>Modificar</button>
</a>
	<a href="regbd.php?function=add&id_pag=1">
		<button>Confirmar</button>
	</a>
<script src="../js/actualizacionDinamica.js"></script>
