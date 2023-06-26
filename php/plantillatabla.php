<?php
	$conexion=mysqli_connect("localhost", "root", "", "proyectoweb");
	if ( !($_GET['function']='add' && $_GET['id_pag'])){
        header("Location: ../html/Principal.html");
        exit;
    }

	session_start();
	$validacion = $_SESSION['valid'];
	if($validacion != "16022236204009818131831320183") {
		session_destroy();
		header("Location: ../html/Principal.html");
	}

	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
		session_destroy();
		session_unset();
	}
	$_SESSION['LAST_ACTIVITY'] = time();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registros</title>
	<script src="../js/jquery-3.6.4.min.js" type="text/javascript"></script>
	<script src="../js/cerrarSessionAJAX.js" type="text/javascript"></script>
</head>
<body>
	<table style="margin: 0 auto;" border="1">
		<tr>
			<th colspan="9">Registro de Contrataciones</th>
		</tr>
		<tr>
			<th>CURP</th>
			<th>FechaEvento</th>

			<!-- <th>HoraInicio</th> -->
			<th>Folio</th>
			<th>Horario</th>
			<th>TipoEvento</th>
			<th>NumPersonas</th>
			<th>Menú</th>
			<th>Lugar</th>
			<th>Operación</th>
		</tr>
			<?php
				$consulta="SELECT * FROM Contratacion";
				$resultado=mysqli_query($conexion,$consulta);
				//por cada iteracion va llenando filas en la tabla
				while ($show=mysqli_fetch_array($resultado)){	
			?>
		<tr>
			<td><?php echo $show['CURP']?></td>
			<td><?php echo $show['FechaEvento']?></td>
			<!-- <td>/td> -->
			<td><?php echo $show['Folio']?></td>
			<td><?php echo $show['Horario']?></td>
			<td><?php echo $show['tipoEvento']?></td>
			<td><?php echo $show['numPersonas']?></td>
			<td><?php echo $show['Menu']?></td>
			<td><?php echo $show['Lugar']?></td>
			<td><a href="#" onclick="mostrarIframe()">Crear</a> | <a href="update.php?CURP=<?php echo $show['CURP'];?>&function=add&id_pag=1">Editar</a> |<a href="eliminar.php?CURP=<?php echo $show['CURP'];?>&function=add&id_pag=1" > Eliminar</a></td>
			

		</tr>
			<?php
				}
			?>

	</table>
	
	<iframe id="iframeCrear" src="../html/formModificado.html" style="display: none;margin: 0 auto;" width="500px" height="500px" align="center"; ></iframe>
	<!-- >Scripts auixilares para los vinculos<!--> 
	<script>
		function mostrarIframe() {
			var iframe = document.getElementById("iframeCrear");
			if (iframe.style.display === "none") { //lo muestra
				iframe.style.display = "block";
			} else { //lo oculta
				iframe.style.display = "none";
			}
		}
	</script>
	<a href=# onclick="cerrarSesion()"><button>Regresar</button></a>
</body>
</html>