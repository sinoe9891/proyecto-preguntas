<?php
	$id = $_GET['id'];

	if (isset($id)) {
		include 'conexion.php';
		$sqlupdate = "DELETE FROM Preguntas WHERE id = '$id'";

		if ($conn->query($sqlupdate)) {
			header('Location: ../responder.php?eliminar=1');
		} else {
			header('Location: ../responder.php?eliminar=0');
			die("Error al actualizar" . $conn->error);
		}
	}
?>