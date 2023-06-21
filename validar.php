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


	/*
	//Variables para almacenar la hora de inicio y fin
	$horainicio=substr($horario, 0, 2);
	$horafin=substr($horario, -2);
	*/


	$folio=$curp."-".$fecha;
	//variable para guardar el municipio o alcaldía en la DB
	$alc_mun;
	$evt;
	echo "<body style='background-color:D5B5F7'>";
	echo "<h1 style='display:block'>EVENTO AGENDADO</h1>";
	echo "<h2><span style='color:red'>Folio: </span> $folio</h2>";
	echo "<h2>Datos del evento</h2>";
	echo "<p><b>Fecha del evento: </b> $fecha <br>";
	echo "Hora de inicio: ".$horario. " p.m<br>";
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
		$evt=$tipo;
	}else{
		echo "Tipo de evento: $otrot <br>";
		$evt=$otrot;
	}
	echo "Numero de personas: $nump <br>";
	echo "Menu: $menu <br>";
	echo "<h2>Datos del cliente</h2>Nombre: $nombre $appat $apmat <br>";
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
	$_SESSION['calle']=$calle;
	$_SESSION['nex']=$numex;
	$_SESSION['nin']=$numin;
	$_SESSION['col']=$colonia;
	$_SESSION['cop']=$codp;
	$_SESSION['entidad']=$estado;
	$_SESSION['alcmun']=$alc_mun;
	$_SESSION['lugar']=$lugar;
	$_SESSION['date']=$fecha;
	$_SESSION['hora']=$horario;
	$_SESSION['tipo']=$evt;
	$_SESSION['np']=$nump;
	$_SESSION['menu']=$menu;

?>
	<a href="formulario.html">
		<button>Modificar</button>
	</a>
	<a href="regbd.php">
		<button>Confirmar</button>
	</a>
