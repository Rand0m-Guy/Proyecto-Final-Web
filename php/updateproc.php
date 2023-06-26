<?php
	$varup=$_REQUEST['curp'];
	$fecha=$_REQUEST['fecha'];
	$folio=$_REQUEST['folio'];
	$horario=$_REQUEST['horario'];
	$tipo=$_REQUEST['tipo'];
	$npersonas=$_REQUEST['npers'];
	$menu=$_REQUEST['menu'];
	$lugar=$_REQUEST['lugar'];
	$newfolio=$varup.$fecha;
	$conexion = mysqli_connect("localhost","root", "","proyectoweb");
	$update= "UPDATE contratacion SET FechaEvento='$fecha', Folio='$newfolio', Horario='$horario', tipoEvento='$tipo', numPersonas='$npersonas', Menu='$menu', Lugar='$lugar' WHERE CURP='$varup'";
	$result=mysqli_query($conexion, $update);
	if($result)
	{
		echo "<script>alert('Datos actualizados correctamente'); window.location.href='plantillatabla.php?function=add&id_pag=1'</script> ";
	}
	else{
		echo "<script>alert('Datos no almacenados');</script>";
	}


?>