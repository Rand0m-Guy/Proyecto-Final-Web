<?php//incluir este código en el html de admin para evitar un "redireccionamiento" y así mostrar todo dentro del formulario de admin. 
$user=$_POST['usuario']; 
$password=$_POST['contra']; 
$conexion=mysqli_connect("localhost","root","","proyectoweb"); 
$consulta="SELECT * FORM Administrador where usuario='$user' and contra='$password'"; 
$resultado=mysqli_query($conexion,$consulta);
$registros=mysqli_num_rows($resultado); //si la cantidad de registros es mayor a cero, es porque sí existe el registro 
	if($registros>0){ /*Ruta al archivo de bienvenido -> parte admin*/
	}else{ /*ruta o mensaje de rechazo*/
	}
?>