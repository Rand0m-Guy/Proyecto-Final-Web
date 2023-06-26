<?php
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
	
	$conexion=mysqli_connect("localhost", "root", "", "proyectoweb");
	$id=$_GET['CURP'];

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
	<script src="../js/jquery-3.6.4.min.js" type="text/javascript"></script>
	<title>Registros</title>
</head>
<body>
	<table style="margin: 0 auto;" border="1">
		<form action="updateproc.php?function=add&id_pag=1" method="POST">
		<tr>
			<th colspan="9">Tabla de actualización</th>
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
				
				$consulta="SELECT * FROM Contratacion where  CURP ='$id'";

				$resultado=mysqli_query($conexion,$consulta);
				//por cada iteracion va llenando filas en la tabla
				while ($show=mysqli_fetch_array($resultado)){	
			?>
		<tr>

			<td><input type="hidden" name="curp" value="<?php echo $show['CURP']?>" readonly></td>
			<td><input type="date" name="fecha" value="<?php echo $show['FechaEvento']?>" ></td>
			<td><input type="text" name="folio" value="<?php echo $show['Folio']; ?>" readonly></td>
			<td><input type="text" name="horario" value="<?php echo $show['Horario']?>"></td>
			<td><input type="text" name="tipo" value="<?php echo $show['tipoEvento']?>"></td>
			<td><input type="text" name="npers" value="<?php echo $show['numPersonas']?>"></td>
			<td><input type="text" name="menu" value="<?php echo $show['Menu']?>"></td>
			<td><input type="text" name="lugar" value="<?php echo $show['Lugar']?>"></td>
			<td><input type="submit" name="update" id="update" value="Actualizar"></td>

		</tr>
			<?php
				}
			?>
		</form>
	</table>
	<script src="../js/actualizacionDinamica.js"></script>

</body>
</html>