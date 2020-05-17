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
    <th> Acciones </th>
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
    echo "
    <td>
        <button name=\"modificar\" onclick=\"modificar(" . $consulta[$columnas[0]] . ")\" class=\"btn-modificar\">Modificar</button>
        <button name=\"eliminar\" onclick=\"eliminar(" . $consulta[$columnas[0]] . ")\"  class=\"btn-eliminar\">Eliminar</button>
    </td>
    </tr>";
}
echo "</table>";
include("../Conexion/CerrarConexion.php");
