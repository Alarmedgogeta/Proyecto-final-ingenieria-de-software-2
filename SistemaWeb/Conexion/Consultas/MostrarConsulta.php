<?php
$columnas = array();
$filas = array();
echo "
<table id=\"t01\">
    <tr>";
while($consulta = mysqli_fetch_field($resultados)){
    $nombre = $consulta->name;
    array_push($columnas,$nombre);
    echo "<th>".$nombre."</th>";
}
echo "
    </tr>";
include("../Conexion/CerrarConexion.php");
$conexion = new mysqli($host, $usuariodb, $clavedb, $basededatos);
	if ($conexion->connect_error) {
	    die("Nuestro sitio experimenta fallos....");
    }
while ($consulta = mysqli_fetch_array($resultados)) {
    echo "<tr>";
    array_push($filas, $consulta);
    for($i=0;$i<count($columnas);$i++){
        echo "<td>".$consulta[$columnas[$i]]."</td>";
    }
    echo "</tr>";
}
echo "</table>";
include("../Conexion/CerrarConexion.php");
