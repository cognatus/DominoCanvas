<?php
	function conecta(){
		$conecta = mysqli_connect( "localhost", "root", "n0m3l0", "domino");
		if ($conecta->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		$tildes = $conecta->query("SET NAMES 'utf8'");

		return $conecta;
	}
?>