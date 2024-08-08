<?php

include_once 'includes/Conexion.php';

// ************* FUNCION PARA MANEJAR ERRORES *************
function mostrarError($errores, $campo) {
    $alerta = '';
    if (isset($errores[$campo]) && !empty($campo)) {
        $alerta = "<div class='alerta alerta-error'>" . $errores[$campo] . '</div>';
    } else {
        
    }
    return $alerta;
}

// ************* FUNCION PARA BORRAR ERRORES *************
function borrarErrores() {
//    $_SESSION['errores'] = null;
    session_unset();
}


// ************* FUNCION PARA CONSEGUIR CATEGORIAS *************
function conseguirCategorias($conn) {
    $sql = "SELECT * FROM `categoria` ORDER BY id ASC;";
    $categorias = mysqli_query($conn, $sql);

    $result = array();
    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $result = $categorias;
    }

    return $result;
}

// ************* FUNCION PARA CONSEGUIR ENTRADAS *************
function conseguirEntradas($conn) {
    $queryEntradas = "SELECT e.*, c.nombre FROM entrada e 
    INNER JOIN categoria c ON id_categoria = c.id 
    ORDER BY e.id DESC LIMIT 6";
    $entradas = mysqli_query($conn, $queryEntradas);

    $result = array();
    if ($entradas && mysqli_num_rows($entradas) >= 1) {
        $result = $entradas;
    }
    return $entradas;
}
