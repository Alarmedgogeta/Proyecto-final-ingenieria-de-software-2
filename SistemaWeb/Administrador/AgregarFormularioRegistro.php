<?php
echo '
<div id="formularioRegistro" hidden>
<form method="POST" action="' . $archivoActual . '">
<input type="text" id="fname" name="idRegistro" hidden value="">
<input type="text" id="fname" name="Accion" hidden value="0">';
for ($i = 1; $i < (count($columnas)); $i++) {
    if ($tiposDeDatos[$i] === 10) {
        echo '<div class="row">
        <div class="col-25">
            <label for="fname">' . $columnas[$i] . ':</label>
        </div>
        <div class="col-75">
            <input type="date" id="fname" name="' . $columnas[$i] . '" placeholder="' . $columnas[$i] . '...">
        </div>
    </div>';
    } else {
        echo '<div class="row">
        <div class="col-25">
            <label for="fname">' . $columnas[$i] . ':</label>
        </div>
        <div class="col-75">
            <input type="text" id="fname" name="' . $columnas[$i] . '" placeholder="' . $columnas[$i] . '...">
        </div>
    </div>';
    }
}
echo '
<div class="row">
    <div class="col-25">
        <label for="fname"></label>
    </div>
    <div class="col-75">
        <input type="submit" value="Enviar" name="btnAgregar">
    </div>
</div>
</form>
</div>';
