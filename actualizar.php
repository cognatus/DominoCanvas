<?php

	include 'conexion.php';

	$boleta = $_POST['boleta'];
	$nombres = $_POST['nombres'];
	$app = $_POST['app'];
	$apm = $_POST['apm'];
	$mail = $_POST['mail'];
	$contra = $_POST['contra'];

	$base = conecta();
	$query = "UPDATE alumnos SET nombres='$nombres', apellidoP='$app', apellidoM='$apm', mail='$mail', contrasenia='$contra' WHERE boleta=$boleta;";

	if(mysqli_query($base, $query)){
		header("Location: /DominoCanvas/index.php");
		die();
	}else{
		echo 'Error: ' . mysqli_error($base);
		echo $query;
	}
?>