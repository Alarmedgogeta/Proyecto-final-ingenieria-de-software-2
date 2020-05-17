<?php
include("../Conexion/AbrirConexion.php");
$sql = "SELECT * FROM $tabla_db1";
$resultados = mysqli_query($conexion, $sql);
?>