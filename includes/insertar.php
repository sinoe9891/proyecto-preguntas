<?php
	$boton = $_POST['nueva_pregunta']; // Información de Botón
	$nueva_pre = $_POST['new_question']; //Información del campo

	if (isset($boton)) {
		//Conexión DB
		include 'conexion.php';
		//Declarando una variable con el Query
		$sqlquery = "INSERT INTO preguntas (preguntas, estado) VALUES ('$nueva_pre', 1)";
		// Enviar datos por medio de la conexión y enviar query
		// mysqli_query($conn, $sqlquery);
		if ($conn->query($sqlquery)===true) {
			header('Location: ../agregar.php?envio=1');
		}else{
			header('Location: ../agregar.php?envio=2');
			die($conn->error);
		}
	}
?>