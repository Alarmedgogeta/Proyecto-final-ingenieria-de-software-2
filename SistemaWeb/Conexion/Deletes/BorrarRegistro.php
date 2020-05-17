<?php
include("../Conexion/AbrirConexion.php");
$resultados = mysqli_query($conexion, " DELETE FROM $tabla_db1 WHERE Id = $id");
include("../Conexion/CerrarConexion.php");
?>