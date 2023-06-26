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
$estado=ucfirst($_REQUEST['entidad']);
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
//html
echo "<head>";
	echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">';
	echo '<link rel="stylesheet" type="text/css" href="../css/validar.css"/>';
	echo '<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&family=Sacramento&display=swap" rel="stylesheet">';
	echo '<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">';
	echo '<title>Evento Agendado</title>';
	echo "</head>";

	echo "<body>";
echo "<h1 class='titulo'>Revisa tus datos</h1>";
echo "<div class='contenedor container  w-75 p-3 my-3 position-relative  d-flex flex-column'>";// div principal
	echo "<h2 class='folio'>Folio: <span >$folio</span> </h2>";
		echo '<section class="sec p-3 w-75 p-3 my-3 position-relative container">'; // section para datos del cliente
	
			echo "<h2 class='subtitulo'>Tus datos</h2>";
			echo '<div class="datos">';
				echo "<b>Nombre:</b> $nombre $appat $apmat <br>";
				echo "CURP: $curp <br>";
				echo "Correo: $mail <br> Telefono: $tel <br>";

				echo '<hr class="">';

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
			echo '</div>';
			
		echo "</section>";	

		echo '<section class="sec w-75 p-3 my-3 position-relative" >'; // contenedor para datos del evento		

			echo "<h2 class='subtitulo'>Datos del evento</h2>";
			echo '<div class="datos">';	
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
				echo "Menu: $menu <br>";
			echo '</div>';
		echo '</section>';		
echo '</div>';	
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
$_SESSION['entidad']=$estado;
$_SESSION['alcmun']=$alc_mun;
$_SESSION['lugar']=$place;
$_SESSION['date']=$fecha;
$_SESSION['hora']=$horario;
$_SESSION['tipo']=$evt;
$_SESSION['np']=$nump;
$_SESSION['menu']=$opmenu;
$_SESSION['lugarimg']=$fotolugar;
?>
<div class="d-grid gap-2 col-6 mx-auto position-relative mx-auto">
    <div class="d-flex justify-content-center">
        <div class="btn text-wrap">
            <a href="../html/formulario.html">
                <button class="boton mx-xxl-5">Modificar</button>
            </a>
        </div>
        <div class="btn text-wrap">
            <a href="regbd.php">
                <button class="boton mx-xxl-5">Confirmar</button>
            </a>
        </div>
    </div>
</div>
<script src="../js/actualizacionDinamica.js"></script>
