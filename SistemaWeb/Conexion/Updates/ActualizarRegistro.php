<?php
    $sql = "UPDATE $tabla_db1 SET ";
    for ($i = 0; $i < (count($datos) - 1); $i++) {
        $sql = $sql . $columnas[$i+1] . " = ";
        if (is_numeric($datos[$i])) {
            $sql = $sql . $datos[$i] . ", ";
        } else {
            $sql = $sql . "'" . $datos[$i] . "', ";
        }
    }
    $sql = $sql . $columnas[(count($columnas)-1)] . " = ";
    if (is_numeric($datos[(count($datos) - 1)])) {
        $sql = $sql . $datos[(count($datos) - 1)] . " ";
    } else {
        $sql = $sql . "'" . $datos[(count($datos) - 1)] . "' ";
    }
    $sql = $sql . "WHERE Id = " . $idRegistro;
    $conexion->query($sql);
?>