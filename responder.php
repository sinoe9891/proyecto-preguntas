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

				$preguntas_query = "SELECT * FROM preguntas";

				$result = $conn->query($preguntas_query);
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
							<p><?php echo $estado = ($estado == 1) ? "Respondida" : "No Respondida"; ?></p>
						</td>
						<td>
							<a href="responder.php?id=<?php echo $id ?>">
								<p>Responder</p>
							</a>
							<a href="includes/eliminar.php?id=<?php echo $id ?>">
								<p>Eliminar</p>
							</a>
						</td>
					</tr>
				<?php
				}
			} else {
				echo 'Conexión Fallida';
			};
			if (isset($_GET['id'])) {
				$resp = $_GET['id'];
				$respoder_resp = "SELECT * FROM preguntas WHERE id = '$resp'";
				$resput = $conn->query($respoder_resp);
				while ($answer = $resput->fetch_assoc()) {
					$pregunt = $answer['preguntas'];
					$respt = $answer['respuesta'];
				?>
					<div style="<?php echo $ver; ?>">
						<h4>Responder Pregunta</h4>
						<p>¿<?php echo $pregunt; ?></p>
						<form action="includes/responder.php?id=<?php echo $resp ?>" method="post">
							<div>
								<textarea name="contenido_respuesta" id="" cols="30" rows="3"><?php echo $respt ?></textarea>
							</div>
							<div>
								<input type="submit" name="respondio" value="Guardar Respuesta">
							</div>
						</form>
					</div>
			<?php
				}
				$conn->close();
				$ver = "display:none";
				if ($resp) {
					$ver = "display:initial";
				};
			};
			?>

		</table>
	</div>
</body>

</html>