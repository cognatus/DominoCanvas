<?php
	include 'conexion.php';

	$base = conecta();

	$identificador = $_POST['identificador'];
	$contra = $_POST['contra'];

	$query = "SELECT * FROM admin WHERE id='$identificador' AND contrasenia='$contra';";

	$resultado = mysqli_query($base, $query);

	$usuario = mysqli_fetch_array($resultado);

	if($usuario){
		session_start();
		$_SESSION["nombre"] = $usuario['nombres'].' '.$usuario['apellidoP'].' '.$usuario['apellidoM'];
		$_SESSION["privilegio"] = $usuario['privilegio'];
		header("Location: /DominoCanvas/admin.php");
	}else{
		echo 'Datos incorrectos.';
	}


?>