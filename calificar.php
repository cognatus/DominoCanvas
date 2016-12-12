<?php 

	
	echo "Tu calficacion es:";
	echo $_POST['calficacion'];

	include 'conexion.php';

	session_start();

	$base = conecta();
	$boleta = $_SESSION["boleta"];
	$calif = $_POST['calficacion'];

	$query = "";

	if ($_SESSION["nivel"] == 1) {
		$query = "UPDATE alumnos SET calif1=$calif, nivel=2 WHERE boleta=$boleta;";
	}elseif ($_SESSION["nivel"] == 2) {
		$query = "UPDATE alumnos SET calif2=$calif, nivel=3 WHERE boleta=$boleta;";
	}elseif ($_SESSION["nivel"] == 3) {
		$query = "UPDATE alumnos SET calif3=$calif, nivel=0 WHERE boleta=$boleta;";
	}else{
		echo "Tu calificacion no puede ser guardada";
		sleep(10);
		session_start();

		session_unset(); 

		session_destroy(); 

		header("Location: /DominoCanvas");
	}

	if(mysqli_query($base, $query)){
		echo "exito guardando calificacion";
	}else{
		echo 'Error: ' . mysqli_error($base);
		echo $query;
	}

 ?>