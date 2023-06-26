<?php
	 $estados=array('aguascalientes'=>'Aguascalientes','bajacalifornia'=>'Baja California','bajacaliforniasur'=>'Baja California Sur','campeche'=>'Campeche','chiapas'=>'Chiapas','chihuahua'=>'Chihuahua','cdmx'=>'CDMX','coahuila'=>'Coahuila','colima'=>'Colima','durango'=>'Durango','guanajuato'=>'Guanajuato','guerrero'=>'Guerrero','hidalgo'=>'Hidalgo','jalisco'=>'Jalisco','edomex'=>'Estado de México','michoacan'=>'Michoacán','morelos'=>'Morelos','nayarit'=>'','nuevoleon'=>'Nuevo León','oaxaca'=>'Oaxaca','puebla'=>'Puebla','queretaro'=>'Querétaro','quintanaroo'=>'Quintana Roo','sanluispotosi'=>'San Luis Potosí','sinaloa'=>'Sinaloa','sonora'=>'Sonora','tabasco'=>'Tabasco','tamaulipas'=>'Tamaulipas','tlaxcala'=>'Tlaxcala','veracruz'=>'Veracruz','yucatan'=>'Yucatán','zacatecas'=>'Zacatecas');

	$alcaldias = array('alvaroobregon' =>'Álvaro Obregón','azcapotzalco' =>'Azcapotzalco','bj' =>'Benito Juárez','coyoacan' =>'Coyoacán','cuajimalpa' =>'Cuajimalpa','cuauhtemoc' =>'Cuauhtémoc','madero' =>'Gustavo A. Madero','iztacalco' =>'Iztacalco','iztapalapa' =>'Iztapalapa','mcontreras' =>'Magdalena Contreras','hidalgo' =>'Miguel Hidalgo','malta' =>'Milpa Alta','tlahuac' =>'Tláhuac','tlalpan' =>'Tlalpan','carranza' =>'Venustiano Carranza','xochimilco' =>'Xochimilco', 'ninguno'=>'Ninguna alcaldia' );

	$eventos  = array('bautizo' =>'Bautizo' ,'comunion' =>'Primera Comunión' ,'quince' =>'XV Años' ,'boda' =>'Boda' ,'cumple' =>'Cumpleaños' ,'otro' =>'Otro'  );
	$lugares = array('salona' => 'Salón A','salonb' =>'Salón B' ,'jardin' =>'Jardín');
	$menus = array('economico'=>'Económico','ejecutivo'=>'Ejecutivo');




    $folio=$_REQUEST['folio'];

    $conexion = mysqli_connect("localhost","root", "","proyectoweb");

    $selectContratacion = "SELECT * FROM Contratacion WHERE Folio='$folio'";
    $resultado = mysqli_query($conexion, $selectContratacion);
    $registros=mysqli_num_rows($resultado);

    if ($registros==0){
        echo "<script> alert('No existe un registro con ese folio'); window.location = 'comprobante.php?function=add&id_pag=1';</script>";
    }else{
		$evento=mysqli_fetch_array($resultado);
		$curp=substr($evento['Folio'],0,18);

		$selectCliente = "SELECT * FROM Cliente WHERE CURP='$curp'";
		$resultado = mysqli_query($conexion,$selectCliente);
		$cliente = mysqli_fetch_array($resultado);

		//Sesiones para mandar al PDF
		session_start();
		$_SESSION['folio']=$evento['Folio'];
		$_SESSION['nombre']=$cliente['Nombre'];
		$_SESSION['ap']=$cliente['ApellidoP'];
		$_SESSION['am']=$cliente['ApellidoM'];
		$_SESSION['curp']=$curp;
		$_SESSION['mail']=$cliente['email'];
		$_SESSION['tel']=$cliente['Tel'];
		$_SESSION['calle']=$cliente['Calle'];
		$_SESSION['nex']=$cliente['nExterior'];
		$_SESSION['nin']=$cliente['nInterior'];
		$_SESSION['col']=$cliente['Colonia'];
		$_SESSION['cop']=$cliente['CP'];
		$_SESSION['estadopdf']=$estados[$cliente['EntidadF']];
		$_SESSION['alcmun']=$cliente['Alcadia'];
		$_SESSION['lugarpf']=$lugares[$evento['Lugar']];
		$_SESSION['date']=$evento['FechaEvento'];
		$_SESSION['hora']=$evento['Horario'];
		$_SESSION['tipo']=$evento['tipoEvento'];
		$_SESSION['np']=$evento['numPersonas'];
		$_SESSION['menupdf']=$menus[$evento['Menu']];

		if($evento['Lugar']=='salona' or $evento['Lugar']=='Salón A'){
			$_SESSION['lugarimg']="salon1-0.jpg";
		}
		if($evento['Lugar']=='salonb' or $evento['Lugar']=='Salón B'){
			$_SESSION['lugarimg']="salon2-2.jpg";
		}
		if($evento['Lugar']=='jardin' or $evento['Lugar']=='Jardín'){
			$_SESSION['lugarimg']="jardin-0.jpg";
		}
		// RUTA A PDF
		header("Location: ../pdf.php");
	}
     
?>