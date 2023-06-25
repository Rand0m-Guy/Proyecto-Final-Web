<?php
    $folio=$_REQUEST['folio'];

    $conexion = mysqli_connect("localhost","root", "n0m3l0","proyectoweb");

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
		$_SESSION['entidad']=$cliente['EntidadF'];
		$_SESSION['alcmun']=$cliente['Alcadia'];
		$_SESSION['lugar']=$evento['Lugar'];
		$_SESSION['date']=$evento['FechaEvento'];
		$_SESSION['hora']=$evento['Horario'];
		$_SESSION['tipo']=$evento['tipoEvento'];
		$_SESSION['np']=$evento['numPersonas'];
		$_SESSION['menu']=$evento['Menu'];
		if($cliente['Lugar']=='Salón A'){
			$_SESSION['lugarimg']="salon1-0.jpg";
		}
		if($cliente['Lugar']=='Salón B'){
			$_SESSION['lugarimg']="salon2-2.jpg";
		}
		if($cliente['Lugar']=='Jardín'){
			$_SESSION['lugarimg']="jardin-0.jpg";
		}
		// RUTA A PDF
		header("Location: ../pdf.php");
	}
     
?>