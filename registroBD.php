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

echo "".$menu;
?>