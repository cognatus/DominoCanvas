<?php 

	
	echo "Tu calficacion es:";
	echo $_POST['calficacion'];

	include 'conexion.php';

	$base = conecta();

	session_start();

	echo $_SESSION["nivel"];
	echo $_SESSION["boleta"];

	/*$query = '';

	if ($_SESSION["nivel"] == 1) {
		$query = "UPDATE alumnos SET calif1=$_POST['calficacion'], nivel=2 WHERE boleta=$_SESSION["boleta"];";
	}else if ($_SESSION["nivel"] == 2) {
		$query = "UPDATE alumnos SET calif2=$_POST['calficacion'], nivel=3 WHERE boleta=$_SESSION["boleta"];";
	}else if ($_SESSION["nivel"] == 3) {
		$query = "UPDATE alumnos SET calif3=$_POST['calficacion'], nivel=0 WHERE boleta=$_SESSION["boleta"];";
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
	}*/

 ?>