<?php
include("AbrirConexion.php");
if ($conexion->connect_error) {
    echo "Generando base de datos...<br>";
    include("GenerarBaseDeDatos.php");
}else{
    include("CerrarConexion.php");
}
?>