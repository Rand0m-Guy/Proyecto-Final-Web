<?php
	$conexion=mysqli_connect("localhost", "root", "", "proyectoweb");
	$id=$_GET['CURP'];
	
?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/tabla.css"/>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&family=Sacramento&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registros</title>
</head>
<body>
<div  class="d-flex justify-content-center">
	<table class="table table-responsive tabla border border-white	">
		<form action="updateproc.php" method="POST">
		<tr>
			<th colspan="9" class="titulo">Tabla de actualización</th>
		</tr>
		<tr class="colum">
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
			<td><input type="submit" name="update" id="update" class="btn btn-primary boton" value="Actualizar"></td>

		</tr>
			<?php
				}
			?>
		</form>
	</table>
</div>
	<script src="../js/actualizacionDinamica.js"></script>

</body>
</html>