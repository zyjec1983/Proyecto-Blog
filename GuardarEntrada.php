<?php
/*

if (isset($_POST)) {
    
    require_once 'includes/Conexion.php';
    
    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($conn, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conn, $_POST['descripcion']) : false;
    $categoria = isset($_POST['categoria']) ? (int) $_POST['categoria'] : false;
    $usuario = $_SESSION['usuario']['id'];
    

// validar 

    $errores = array();

    if (empty($titulo)) {
        $errores['titulo'] = 'El titulo no es valido';
    }
    
    if (empty($descripcion)) {
        $descripcion['descripcion'] = 'La descripcion titulo no es valido';
    }
    
    if (empty($categoria) && !is_numeric($categoria)) {
        $categoria['categoria'] = 'La categoria no es valido';
    }
    
    if(count($errores) == 0 && $usuario!=null){
        $sql = "insert into entrada values (null, $usuario, $categoria, '$titulo', '$descripcion', CURDATE());";
        $guardar = mysqli_query($conn, $sql);
    }else{
        $_SESSION['errores_entrada'] = $errores;
    }
}

header("location: index.php");
  */


session_start(); // Ensure session is started

if (isset($_POST)) {
    
    require_once 'includes/Conexion.php';
    
    // Sanitize and escape input
    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($conn, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conn, $_POST['descripcion']) : false;
    $categoria = isset($_POST['categoria']) ? (int) $_POST['categoria'] : false;
    $usuario = isset($_SESSION['usuario']['id']) ? $_SESSION['usuario']['id'] : null; // Ensure $_SESSION['usuario']['id'] is set
    
    // Validate input
    $errores = array();

    if (empty($titulo)) {
        $errores['titulo'] = 'El título no es válido';
    }
    
    if (empty($descripcion)) {
        $errores['descripcion'] = 'La descripción no es válida';
    }
    
    if (empty($categoria) || !is_numeric($categoria)) {
        $errores['categoria'] = 'La categoría no es válida';
    }
    
    if (count($errores) == 0 && $usuario !== null) {
        // Prepare and bind parameters using prepared statement
        $sql = "INSERT INTO entrada (usuario_id, categoria_id, titulo, descripcion, fecha) VALUES (?, ?, ?, ?, CURDATE())";
        
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "iiss", $usuario, $categoria, $titulo, $descripcion);
        
        
        // Execute query
        $guardar = mysqli_stmt_execute($stmt);
        
        if (!$guardar) {
            $_SESSION['error_db'] = 'Error al guardar la entrada';
        }
        
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['errores_entrada'] = $errores;
    }
}

header("Location: index.php");
exit();
?>
