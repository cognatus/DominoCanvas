<?php
	function conecta(){
		$conecta = mysqli_connect( "localhost", "root", "n0m3l0");
		if ($conecta->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}else {
			echo "ahuevo";
		}
		mysqli_select_db($conecta, "dominokj");
		$tildes = $conecta->query("SET NAMES 'utf8'");

		return $conecta;
	}
?>