<?php
	$host = "localhost";     
	$usuariodb = "root";   
	$clavedb = "";	
	$basededatos = "musica";
	$conexion = new mysqli($host, $usuariodb, $clavedb, $basededatos);

	if ($conexion->connect_error) {
		echo "Base de datos inexistente...<br>";
    }
?>