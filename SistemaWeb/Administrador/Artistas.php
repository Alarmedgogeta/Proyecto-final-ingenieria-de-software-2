<html>
<link rel="stylesheet" type="text/css" href="../style.css">
<head>
    <title>Administrador</title>
    <script type="text/javascript" src="../Scripts/jsPDF/jquery.min.js"></script>
    <script src="../Scripts/jsPDF/dist/jspdf.min.js"></script>
    <script src="../Scripts/jsPDF/jspdf.plugin.autotable.min.js"></script>
</head>

<body>
    <div class="navbar">
        <a href="Artistas.php" class="active">Artistas</a>
        <a href="Albumes.php">Albumes</a>
        <a href="Canciones.php">Canciones</a>
        <a href="CancionesDeListaDeReproduccion.php">Canciones de Lista de Reproduccion</a>
        <a href="ListasDeReproduccion.php">Listas de Reproduccion</a>
        <a href="CancionesEscuchadas.php">Canciones Escuchadas</a>
        <a href="Usuarios.php">Usuarios</a>
    </div>
    <div class="contenido">
        <?php
        $tabla_db1 = "Artistas";
        include("../Conexion/Consultas/ConsultarTabla.php");
        include("../Conexion/Consultas/MostrarConsulta.php");
        if (isset($_POST['btnGenerar'])) {
            $nombreSingular = "Artista";
            include("../Conexion/Consultas/GenerarXML.php");
        }
        ?>
        <form method="POST" action="Artistas.php">
            <input type="submit" value="Generar xml de tabla libros" name="btnGenerar">
            <input type="submit" value="Generar PDF" id="generar">
        </form>
    </div>
    <script>
        $("#generar").click(function() {
            var pdf = new jsPDF();
            pdf.text(20, 20, "Mostrando la consulta en una Tabla con JsPDF y el Plugin AutoTable");
            var columns = ["<?php for ($i = 0; $i < (count($columnas) - 1); $i++) { echo $columnas[$i]?>" ,"<?php } echo $columnas[(count($columnas)-1)]?>"];
            var data = [
                <?php foreach($filas as $f):?>
                [ "<?php for($i = 0; $i<(count($columnas)-1); $i++) { echo $f[$i] ?>", "<?php } echo $f[(count($columnas)-1)] ?>" ],
                <?php endforeach; ?>
            ];
            pdf.autoTable(columns, data, {
                margin: {
                    top: 25
                }
            });
            pdf.save('miconsulta.pdf');
        });
    </script>
</body>

</html>