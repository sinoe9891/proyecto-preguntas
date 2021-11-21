<?php
include 'includes/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<title>Document</title>
</head>

<body>
	<div class="main">
		<h1>Proyecto Preguntas</h1>
	</div>
	<a href="index.php">
		<p>Regresar</p>
	</a>
	<div class="container">
		<h2>Listado de Preguntas</h2>

		<table>
			<tr>
				<th>No.</th>
				<th>Pregunta</th>
				<th>Responder</th>
				<th>Estado</th>
				<th>Gestionar</th>
			</tr>
			<?php
			if ($conn) {
				$resp = $_GET['id'];
				$preguntas_query = "SELECT * FROM preguntas";
				$respoder_resp = "SELECT * FROM preguntas WHERE id = '$resp'";
				$result = $conn->query($preguntas_query);
				$resput = $conn->query($respoder_resp);
				print_r($resp);
				$numero = 0;
				while ($question = $result->fetch_assoc()) {
					$numero++;
					$preguntas = $question['preguntas'];
					$respuesta = $question['respuesta'];
					$estado = $question['estado'];
					$id = $question['id'];
					?>
					<tr>
						<td>
							<p><?php echo $numero; ?></p>
						</td>
						<td>
							<p><?php echo $preguntas; ?></p>
						</td>
						<td>
							<p><?php echo $respuesta; ?></p>
						</td>
						<td>
							<p><?php echo $estado = 1 ? "Respondida" : "No Respondida"; ?></p>
						</td>
						<td>
							<a href="responder.php?id=<?php echo $id ?>">
								<p>Responder</p>
							</a>
						</td>
					</tr>
			<?php
				}
				$conn->close();
			} else {
				echo 'Conexión Fallida';
			};

			while ($answer = $resput->fetch_assoc()) {
				$pregunt = $answer['preguntas'];
				print_r($pregunt);
				?>

			<div style="<?php echo $ver; ?>">
				<h4>Responder Pregunta</h4>
				<p>¿<?php echo $pregunt; ?></p>
				<form action="">
					<div>
						<textarea name="contenido_respuesta" id="" cols="30" rows="3"></textarea>
					</div>
					<div>
						<input type="submit" name="respondio" value="Guardar Respuesta">
					</div>
				</form>
			</div>
				<?php
			}s
			$ver = "display:none";
			if ($resp) {
				$ver = "display:initial";
			};
			?>
			
		</table>
	</div>
</body>

</html>