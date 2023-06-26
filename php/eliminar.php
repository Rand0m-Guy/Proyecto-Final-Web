<?php

	$conexion=mysqli_connect("localhost", "root", "", "proyectoweb");
	$id=$_GET['CURP'];
	$delcontrat="DELETE FROM contratacion where CURP='$id'";
	$delcliente="DELETE FROM cliente where CURP='$id'";

	
	$operacion=mysqli_query($conexion,$delcliente);
	$operacion2=mysqli_query($conexion,$delcontrat);
	if ($operacion && $operacion2 ) {
		header("Location: plantillatabla.php?function=add&id_pag=1");
	}
?>