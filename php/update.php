<?php
	$conexion=mysqli_connect("localhost", "root", "", "proyectoweb");
	$id=$_GET['CURP'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registros</title>
</head>
<body>
	<table style="margin: 0 auto;" border="1">
		<form action="updateproc.php" method="POST">
		<tr>
			<th colspan="9">Tabla de acutalización</th>
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

			<td><input type="hidden" name="curp" value="<?php echo $show['CURP']?>"></td>
			<td><input type="date" name="fecha" value="<?php echo $show['FechaEvento']?>"></td>
			<td><input type="text" name="folio" value="<?php echo $show['Folio']; ?>"></td>
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
</body>
</html>