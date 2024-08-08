<?php

if (isset($_POST)) {

    // Cocnnetion to the data base
    require_once 'includes/Conexion.php';

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conn, $_POST['nombre']) : false;

    /*     * *********** ARRAY DE ERRORES *********** */
    $errores = array();

    /*     * *********** VALIDANDO NOMBRE *********** */
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $validado_nombre = true;
    } else {
        $validado_nombre = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    if (count($errores) == 0) {
        $sql = "INSERT INTO categoria VALUES (NULL, '$nombre');";
        $guardar = mysqli_query($conn, $sql);
    }

}

header('Location: index.php');


