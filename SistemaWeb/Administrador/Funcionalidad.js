function agregar() {
    var tabla = document.getElementById("t01");
    tabla.remove();
    var formulario = document.getElementById("formulario");
    formulario.remove();
    formulario = document.getElementById("formularioRegistro");
    formulario.style.display = "block";
}
function modificar(id) {
    var tabla = document.getElementById("t01");
    tabla.remove();
    var formulario = document.getElementById("formulario");
    formulario.remove();
    formulario = document.getElementById("formularioRegistro");
    formulario.style.display = "block";
    var columnas = ["<?php for ($i = 0; $i < (count($columnas) - 1); $i++) { echo $columnas[$i]?>", "<?php } echo $columnas[(count($columnas)-1)]?>"];
    document.getElementsByName("idRegistro")[0].value = id;
    document.getElementsByName("Accion")[0].value = 1;
    /*for(i = 1; i < columnas.length; i++){
        document.getElementsByName(columnas[i])[0].value = registro;
    }*/
}
function eliminar(id) {
    document.getElementsByName("idRegistro")[0].value = id;
    document.getElementsByName("Accion")[0].value = 2;
    document.getElementsByName("btnAgregar")[0].click();
}