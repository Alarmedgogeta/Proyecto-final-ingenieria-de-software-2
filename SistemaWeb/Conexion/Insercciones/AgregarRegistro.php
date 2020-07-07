<?php
include("../Conexion/AbrirConexion.php");
$datos = array();
for ($i = 1; $i < (count($columnas)); $i++) {
    array_push($datos, $_POST[$columnas[$i]]);
}
$idRegistro = $_POST["idRegistro"];
$Accion = $_POST["Accion"];
if($Accion==="0"){
    $sql = "INSERT INTO $tabla_db1 VALUES (null, ";
    for ($i = 0; $i < (count($datos) - 1); $i++) {
        if (is_numeric($datos[$i])) {
            $sql = $sql . $datos[$i] . ", ";
        } else {
            $sql = $sql . "'" . $datos[$i] . "', ";
        }
    }
    if (is_numeric($datos[(count($datos) - 1)])) {
        $sql = $sql . $datos[(count($datos) - 1)] . ") ";
    } else {
        $sql = $sql . "'" . $datos[(count($datos) - 1)] . "')";
    }
    $conexion->query($sql);
}
elseif($Accion==="1"){
    include("../Conexion/Updates/ActualizarRegistro.php");
}
elseif($Accion==="2"){
    include("../Conexion/Deletes/BorrarRegistro.php");
}
include("../Conexion/CerrarConexion.php");
