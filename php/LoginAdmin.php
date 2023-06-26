<?php
if ( !($_GET['function']='add' && $_GET['id_pag'])){
	header("Location: ../index.html");
	exit;
}
$user=$_POST['usuario']; 
$password=$_POST['contra']; 
$conexion=mysqli_connect("localhost","root", "n0m3l0","proyectoweb"); 
$consulta="SELECT * FROM admon where Pass='$password'"; 
$resultado=mysqli_query($conexion,$consulta);
$registros=mysqli_num_rows($resultado);
	if($registros>0){
		session_start();
		//Sesiones para traslado a BD
		$_SESSION['valid']="16022236204009818131831320183"; // Número primo grande para usar como validación
	 	header("Location: plantillatabla.php?function=add&id_pag=1");
	 	exit;
	}else{
	 echo "<script>alert('Administrador no registrado'); window.location = 'adminForms.php?function=add&id_pag=1';</script>";
	}
?>