<?php
    session_start();
    $curp=$_SESSION['curp'];
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

    $selectCliente = "SELECT CURP FROM CLIENTE WHERE CURP='$curp'";
    $resultado = mysqli_query($conexion, $selectCliente);
    $registros=mysqli_num_rows($resultado);

    if ($registros==0){
        $insertCliente = "INSERT INTO Cliente VALUES('$curp','$nombre','$apmat','$appat',$num_ext,'$num_int','$colonia','$alc_o_mun','$cp','$entidad','$correo')";
        $resultado = mysqli_query($conexion, $insertCliente);
    }
    $selectContratacion = "SELECT * FROM Contratacion WHERE Lugar='$lugar' AND FechaEvento='$fecha' AND Horario='$hora'";
    $resultado = mysqli_query($conexion, $selectContratacion);
    $registros=mysqli_num_rows($resultado);
    if ($registros==0){
        $insertContratacion = "INSERT INTO Contratacion VALUES('$curp','$fecha','$folio','$hora','$tipo_evento',$num_personas,'$menu','$lugar')";
        $resultado = mysqli_query($conexion, $insertContratacion);
        echo "Tu pedido con el folio  ".$folio." Ha sido almacenado exitosamente!!";
    }else{
        /*Aqui el rebote*/
        echo "<script> alert('Salón, Fecha y Horas ya reservadas'); window.location = '../html/formulario.html';</script>";
    }
?>