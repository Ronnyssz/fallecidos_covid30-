<?php
	
	require 'conexion.php';
	
	$sql = "SELECT id_codigo, fecha_fallecimiento, edad, sexo, fecha_nacimiento, departamento, provincia, distrito FROM fallecidos";
	$resultado = $mysqli->query($sql);
	
?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/jquery.dataTables.min.css">
	
	<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="js/jquery-3.6.0.min.js" ></script>
		<script src="js/bootstrap.min.js" ></script>
		<script src="js/jquery.dataTables.min.js" ></script>
		
    <title>Fallecidos por Covid19</title>
	<script>
			$(document).ready(function() {
			$('#tabla').DataTable();
			} );
			
		</script>
  </head>
  <body>
      <h1>Fallecidos por Covid19</h1>
		<table id="tabla" class="display" style="width:100%">
				<thead>
					<tr>
						<th>Fecha Fallecimiento</th>
						<th>Edad</th>
						<th>Sexo</th>
						<th>Fecha Nacimiento</th>
						<th>Departamento</th>
						<th>Provincia</th>
						<th>Distrito</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php while($fila = $resultado->fetch_assoc()) { ?>
						<tr>
							<td><?php echo $fila['fecha_fallecimiento']; ?></td>
							<td><?php echo $fila['edad']; ?></td>
							<td><?php echo $fila['sexo']; ?></td>
							<td><?php echo $fila['fecha_nacimiento']; ?></td>
							<td><?php echo $fila['departamento']; ?></td>
							<td><?php echo $fila['provincia']; ?></td>
							<td><?php echo $fila['distrito']; ?></td>
							<td><a href="editar.php?id=<?php echo $fila['id_codigo']; ?>" class="btn btn-warning">Editar</a> </td>
							<td><a href="eliminar.php?id=<?php echo $fila['id_codigo']; ?>" class="btn btn-danger">Eliminar</a> </td>
						</tr>
					<?php } ?>
				</tbody>
			</table>			  
      </body>
</html>