<?php
$id = $_GET['id']; // Información de Botón
$respuesta = $_POST['contenido_respuesta']; //Información del campo

if (isset($id)) {
	include 'conexion.php';
	$estado = ($respuesta == "") ? 0 : 1;
	$sqlupdate = "UPDATE preguntas SET respuesta = '$respuesta', estado = $estado WHERE id = '$id'";

	if ($conn->query($sqlupdate)) {
		header('Location: ../responder.php?respoder=1');
	} else {
		header('Location: ../responder.php?respoder=0');
		die("Error al actualizar" . $conn->error);
	}
}
?>