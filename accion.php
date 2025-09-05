<?php
// Mostrar errores en desarrollo
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Incluimos la conexión a MySQL
include_once('dbcon.php');

// Validar existencia de datos requeridos
if (
    isset($_POST["cliente"]) && isset($_POST["servicio"]) &&
    isset($_POST["cantidad"]) && isset($_POST["fechainicial"]) &&
    isset($_POST["fechafinal"])
) {
    // Sanitización básica
    $cliente = strip_tags(trim($_POST["cliente"]));
    $cliente = str_replace(array("\r","\n"),array(" "," "), $cliente);
    $servicio = filter_var(trim($_POST["servicio"]), FILTER_SANITIZE_STRING);
    $cantidad = filter_var(trim($_POST["cantidad"]), FILTER_SANITIZE_NUMBER_INT);
    $fini = $_POST['fechainicial'];
    $ffin = $_POST['fechafinal'];
    $srv = substr($servicio, 0, 3);

    // Query para guardar
    $query = "INSERT INTO controlh (cliente, servicio, cantidad, finicio, ffin) 
              VALUES('$cliente', '$srv', '$cantidad', '$fini', '$ffin')";

    if ($con->query($query)) {  
        echo "success";
    } else {
        echo "error: " . $con->error;
    }
} else {
    echo "error: Datos incompletos";
}
?>