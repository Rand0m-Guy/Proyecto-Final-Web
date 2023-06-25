<?php
if ( !($_GET['function']='add' && $_GET['id_pag'])){
	header("Location: ../html/Principal.html");
	exit;
}
$user=$_POST['usuario']; 
$password=$_POST['contra']; 
$conexion=mysqli_connect("localhost","root", "n0m3l0","proyectoweb"); 
$consulta="SELECT * FROM admon where Pass='$password'"; 
$resultado=mysqli_query($conexion,$consulta);
$registros=mysqli_num_rows($resultado);
	if($registros>0){
	 header("Location: plantillatabla.php?function=add&id_pag=1");
	 exit;
	
	}else{
	 echo "<script>alert('Administrador no registrado');</script>";
	}
?>