<?php

	include 'conexion.php';

	$boleta = $_POST['boletaBye'];

	$base = conecta();
	$query = "DELETE FROM alumnos WHERE boleta=$boleta;";

	if(mysqli_query($base, $query)){
		header("Location: /DominoCanvas/admin.php");
		die();
	}else{
		echo 'Error: ' . mysqli_error($base);
		echo $query;
	}
?>