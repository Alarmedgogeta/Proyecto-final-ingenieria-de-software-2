<html>
<link rel="stylesheet" type="text/css" href="../style.css">

<head>
    <title>Administrador</title>
</head>

<body>
    <div class="navbar">
        <a href="Artistas.php">Artistas</a>
        <a href="Albumes.php">Albumes</a>
        <a href="Canciones.php">Canciones</a>
        <a href="CancionesDeListaDeReproduccion.php">Canciones de Lista de Reproduccion</a>
        <a href="ListasDeReproduccion.php">Listas de Reproduccion</a>
        <a href="CancionesEscuchadas.php" class="active">Canciones Escuchadas</a>
        <a href="Usuarios.php">Usuarios</a>
    </div>
    <div class="contenido">
        <?php
        $tabla_db1 = "CancionesEscuchadas";
        include("../Conexion/Consultas/ConsultarTabla.php");
        include("../Conexion/Consultas/MostrarConsulta.php");
        if (isset($_POST['btnGenerar'])) {
            $nombreSingular = "CancionEscuchada";
            include("../Conexion/Consultas/GenerarXML.php");
        }
        ?>
        <form method="POST" action="CancionesEscuchadas.php">
            <input type="submit" value="Generar xml de tabla libros" name="btnGenerar">
        </form>
    </div>
</body>

</html>