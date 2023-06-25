<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación</title>
    <script src="../js/jquery-3.6.4.min.js" type="text/javascript"></script>
    <script src="../js/cerrarSessionAJAX.js" type="text/javascript"></script>
</head>
<body>
<?php
        if ( !($_GET['function']='add' && $_GET['id_pag'])){
            header("Location: ../html/Principal.html");
            exit;
        }
        session_start();
        $curp=$_SESSION['curp'];
        $folio=$_SESSION['folio'];
        $nombre=$_SESSION['nombre'];
        $appat=$_SESSION['ap'];
        $apmat=$_SESSION['am'];
        $curp=$_SESSION['curp'];
        $correo=$_SESSION['mail'];
        $tel=$_SESSION['tel'];
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
        $fotolugar=$_SESSION['lugarimg'];
        $conexion = mysqli_connect("localhost","root", "n0m3l0","proyectoweb");


        $selectCliente = "SELECT CURP FROM CLIENTE WHERE CURP='$curp'";
        $resultado = mysqli_query($conexion, $selectCliente);
        $registros=mysqli_num_rows($resultado);

        if ($registros==0){
            $insertCliente = "INSERT INTO Cliente VALUES('$curp','$nombre','$apmat','$appat','$calle',$num_ext,'$num_int','$colonia','$alc_o_mun','$cp','$entidad','$correo','$tel')";
            $resultado = mysqli_query($conexion, $insertCliente);
        }
        $selectContratacion = "SELECT * FROM Contratacion WHERE Lugar='$lugar' AND FechaEvento='$fecha' AND Horario='$hora'";
        $resultado = mysqli_query($conexion, $selectContratacion);
        $registros=mysqli_num_rows($resultado);
        if ($registros==0){
            $insertContratacion = "INSERT INTO Contratacion VALUES('$curp','$fecha','$folio','$hora','$tipo_evento',$num_personas,'$menu','$lugar')";
            $resultado = mysqli_query($conexion, $insertContratacion);
            ?>
            <p>¡Tu pedido con el folio: <?php echo $folio; ?> ha sido almacenado exitosamente!</p>
            <a href="../pdf.php"><button>Generar PDF</button></a>
            <a href="../html/Principal.html" onclick="cerrarSesion()"><button>Regresar</button></a>
            <?php
        }else{
            /*Aqui el rebote*/
            echo "<script> alert('Salón, Fecha y Horas ya reservadas'); window.location = 'formulario.php?function=add&id_pag=1';</script>";
        }
    ?>
</body>
</html>
