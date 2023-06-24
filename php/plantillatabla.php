<?php
	$conexion=mysqli_connect("localhost", "root", "", "proyectoweb");
	if ( !($_GET['function']='add' && $_GET['id_pag'])){
        header("Location: ../html/Principal.html");
        exit;
    }
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
		<tr>
			<th colspan="8">Registro de Contrataciones</th>
		</tr>
		<tr>
			<th>CURP</th>
			<th>FechaEvento</th>
			<!-- <th>HoraInicio</th> -->
			<th>Horario</th>
			<th>TipoEvento</th>
			<th>NumPersonas</th>
			<th>Menú</th>
			<th>Lugar</th>
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
			<!-- <td><?php echo $show['horaInicio']?></td> -->
			<td><?php echo $show['Horario']?></td>
			<td><?php echo $show['tipoEvento']?></td>
			<td><?php echo $show['numPersonas']?></td>
			<td><?php echo $show['Menu']?></td>
			<td><?php echo $show['Lugar']?></td>

		</tr>
			<?php
				}
			?>
	</table>
</body>
</html>