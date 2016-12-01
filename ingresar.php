<?php

	include 'conexion.php';

	$boleta = $_POST['boleta'];
	$nombres = $_POST['nombres'];
	$app = $_POST['app'];
	$apm = $_POST['apm'];
	$mail = $_POST['mail'];
	$contra = $_POST['contra'];

	$base = conecta();
	$query = "INSERT INTO alumnos (boleta, nombres, apellidoP, apellidoM, mail, calif1, calif2, calif3, contrasenia, privilegio) VALUES ($boleta, '$nombres', '$app', '$apm', '$mail', 0, 0, 0, '$contra', 0);";

	if(mysqli_query($base, $query)){
		header("Location: /DominoCanvas/index.php");
		die();
	}else{
		echo 'Error: ' . mysqli_error($base);
		echo $query;
	}
?>