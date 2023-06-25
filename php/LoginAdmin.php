<?php
$user=$_POST['usuario']; 
$password=$_POST['contra']; 
$conexion=mysqli_connect("localhost","root","","proyectoweb"); 
$consulta="SELECT * FROM admon where Pass='$password'"; 
$resultado=mysqli_query($conexion,$consulta);
$registros=mysqli_num_rows($resultado);
	if($registros>0){
	 header("Location: plantillatabla.php");
	 exit;
	
	}else{
	 echo "<script>alert('Administrador no registrado');</script>";
	}
?>