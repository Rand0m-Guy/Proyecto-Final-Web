<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/regbd.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&family=Sacramento&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
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
            <div class="container contenedor">
                <p  class="text-center">¡Tu pedido con el folio: <?php echo $folio; ?> ha sido almacenado exitosamente!</p>
                <div class="d-flex justify-content-center">
                    <div class="d-grid gap-2 col-6 mx-auto position-relative mx-auto">
                        <div class="btn text-wrap btn-sm">
                            <a href="../pdf.php"><button class="boton">Generar PDF</button></a>
                        </div>
                        <div class="btn text-wrap ">
                            <a href="../html/Principal.html" onclick="cerrarSesion()"><button class="boton" >Regresar</button></a>
                        </div>
                    </div>
                </div>
            </div>    
            <?php
        }else{
            /*Aqui el rebote*/
            ?>
            <div class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Alerta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>Salón, Fecha y Horas ya reservadas</p>
                  </div>
                  <div class="modal-footer">
                    <a href="formulario.php?function=add&id_pag=1"><button type="button" class="btn btn-primary">OK</button></a>
                  </div>
                </div>
              </div>
            </div>
            <?php
        }
    ?>  
</body>
</html>
