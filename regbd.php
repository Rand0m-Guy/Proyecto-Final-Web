<?php
session_start();
$folio=$_SESSION['folio'];
$nombre=$_SESSION['nombre'];
$appat=$_SESSION['ap'];
$apmat=$_SESSION['am'];
$curp=$_SESSION['curp'];
$correo=$_SESSION['mail'];
$calle=$_SESSION['calle'];
$num_ext=$_SESSION['nex'];
$num_int=$_SESSION['nin'];
$colonia=$_SESSION['col'];
$cp=$_SESSION['cop'];
$entidad=$_SESSION['entidad'];
$alc_o_mun=$_SESSION['alcmun'];
$lugar=$_SESSION['lugar'];
$fecha=$_SESSION['date'];
$hora=$_SESSION['hora'];
$tipo_evento=$_SESSION['tipo'];
$num_personas=$_SESSION['np'];
$menu=$_SESSION['menu'];

$conexion = mysqli_connect("localhost","root","","proyectoweb");
$insertCliente = "INSERT INTO Cliente VALUES('$curp','$nombre','$apmat','$appat',$num_ext,'$num_int','$colonia','$alc_o_mun','$cp','$entidad','$correo')";
$insertContratacion = "INSERT INTO Contratacion VALUES('$curp','$fecha','$folio','$hora','$tipo_evento',$num_personas,'$menu','$lugar')";
$resultado = mysqli_query($conexion, $insertCliente);
$resultado = mysqli_query($conexion, $insertContratacion);
/*


Aquí va el registro en la base;




*/
echo "Tu pedido con el folio  ".$folio." Ha sido almacenado exitosamente!!";
?>