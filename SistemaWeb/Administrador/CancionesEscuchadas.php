<html>
<link rel="stylesheet" type="text/css" href="../style.css">

<head>
    <title>Administrador</title>
    <script type="text/javascript" src="../Scripts/jsPDF/jquery.min.js"></script>
    <script src="../Scripts/jsPDF/dist/jspdf.min.js"></script>
    <script src="../Scripts/jsPDF/jspdf.plugin.autotable.min.js"></script>
    <script src="Funcionalidad.js"></script>
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
        $archivoActual = "CancionesEscuchadas.php";
        include("../Conexion/Consultas/ConsultarTabla.php");
        include("../Conexion/Consultas/MostrarConsulta.php");
        include("AgregarFormularioRegistro.php");
        if (isset($_POST['btnGenerar'])) {
            $nombreSingular = "CancionEscuchada";
            include("../Conexion/Consultas/GenerarXML.php");
        }
        if(isset($_POST['btnAgregar'])){
            include("../Conexion/Insercciones/AgregarRegistro.php");
        }
        if(isset($_POST['eliminar'])){
            include("../Conexion/Deletes/BorrarRegistro.php");
        }
        ?>
        <form method="POST" action="CancionesEscuchadas.php" id="formulario">
            <input type="submit" value="Generar xml de tabla libros" name="btnGenerar">
            <input type="submit" value="Generar PDF" id="generar">
            <button name="btnAgregar" onclick="agregar()">Agregar registro</button>
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
        function eliminar(id){
            alert("Se va a eliminar registro " + id);
            var datos = new FormData();
            datos.append("id", id);
            fetch('../Conexion/Deletes/BorrarRegistro.php', {
                method: 'POST',
                body: datos
            })
            .then( res => res.json)
            .then( data => {
                if(data === 0){
                    alert("Registro eliminado");
                }
                else if(data === 1){
                    alert("Imposible eliminar registro debido a que aparece en otra tabla");
                }
            })
            //location.reload(true);
        }
    </script>
</body>

</html>