<?php
include("../Conexion/AbrirConexion.php");
include("../Conexion/Consultas/ConsultarTabla.php");
$xml = new DOMDocument('1.0');
$xml->formatOutput=true;
//Se crea el elemento de toda la tabla
$tabla=$xml->createElement($tabla_db1);
$xml->appendChild($tabla);
while ($consulta = mysqli_fetch_array($resultados)) {
    //Se crea el elemento de toda una la fila
    $fila=$xml->createElement($nombreSingular);
    $tabla->appendChild($fila);
    for($i=0;$i<count($columnas);$i++){
        //Se verifica si la columna actual es el id
        if($i===0){
            //Se le asigna la clave primaria (id) del registro como un atributo a la fila
            $fila->setAttribute($columnas[$i], $consulta[$columnas[$i]]);
        }else{
            //Se crea un elemento de cada columna
            $columna=$xml->createElement($columnas[$i], $consulta[$columnas[$i]]);
            //Se agrega la columna a la fila actual
            $fila->appendChild($columna);
        }
    }
}
//Se crea el archivo si no existe
$archivo = fopen("xmlDeConsulta.txt","w");
//Se guarda la variable xml
$salidaXml = $xml->saveXML();
//Se imprime la salida del xml en el archivo
fwrite($archivo, $salidaXml. PHP_EOL);
//Se cierra el archivo
fclose($archivo);
//EXTRA: Se imprime en la plataforma
echo "<xmp>".$salidaXml."</xmp>";
include("../Conexion/CerrarConexion.php");
?>