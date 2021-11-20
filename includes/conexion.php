<?php
	$server = "localhost";
	$user = "root";
	$password = "";
	$db = "db_preguntas";
	
	// Variable = Servidor, Usuario, Contraseña, DB
	$conn = new mysqli($server, $user, $password, $db);

	if ($conn->connect_error) {
		echo 'Problemas en conexión: ', $conn->connect_error;
	}else{
		echo 'Conexión establecida';
	}
	$conn->set_charset("utf8");
?>