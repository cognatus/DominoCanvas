<?php

	include 'conexion.php';

	$boleta = $_POST['boleta'];
	$nombres = $_POST['nombres'];
	$app = $_POST['app'];
	$apm = $_POST['apm'];
	$mail = $_POST['mail'];
	$contra = $_POST['contra'];

	$base = conecta();

	$result = mysqli_query($base, "INSERT INTO alumnos (boleta, nombres, apellidoP, apellidoM, mail, calif1, calif2, calif3, contrasenia, privilegio) VALUES ("+$boleta+", "+$nombres+", "+$app+", "+$apm+", "+$mail+", 0, 0, 0, "+$contra+", 0);");

	echo mysqli_query($base, "INSERT INTO alumnos (boleta, nombres, apellidoP, apellidoM, mail, calif1, calif2, calif3, contrasenia, privilegio) VALUES ("+$boleta+", "+$nombres+", "+$app+", "+$apm+", "+$mail+", 0, 0, 0, "+$contra+", 0);");;
?>