<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<div class="main">
		<h1>Proyecto Preguntas</h1>
	</div>
	<a href="gestionar.php">
		<p>Regresar</p>
	</a>
	<div class="container">
		<form action="includes/insertar.php" method="post">
			<h2>Ingresar Pregunta</h2>
			<div class="input">
				<input type="text" name="new_question" id="new_question" placeholder="Ingresa tu pregunta">
			</div>
			<div class="enviar">
				<input type="submit" name="nueva_pregunta" value="Ingresar Nueva Pregunta">
			</div>
		</form>
	</div>
	<?php
		$envio = isset($_GET['envio']);
		if ($envio == 1){
			// echo "Registró realizado";
			echo "<script> alert('Registro Realizado con Éxito');</script>";
		}elseif($envio == 2) {
			echo "<script> alert('Registro no se registró');</script>";
		};
	?>
</body>

</html>
