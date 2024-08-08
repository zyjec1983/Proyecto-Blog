<?php

if (isset($_POST)) {

    // incluyo conexion a base de datos
    include_once 'includes/Conexion.php';
    // inicia sesion
    if (!isset($_SESSION)) {
        session_start();
    }


    /*     * ************* OPERADOR TERNARIO ************** */
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conn, $_POST['nombre']) : false;
    $apellido = $_POST['apellido'] ? mysqli_real_escape_string($conn, $_POST['apellido']) : false;
    $email = $_POST['email'] ? mysqli_real_escape_string($conn, trim($_POST['email'])) : false;
    $password = $_POST['password'];
    var_dump($_POST);

    /*     * *********** ARRAY DE ERRORES *********** */
    $errores = array();

    /*     * *********** VALIDANDO NOMBRE *********** */
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $validado_nombre = true;
    } else {
        $validado_nombre = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    /*     * *********** VALIDANDO APELLIDO *********** */
    if (!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)) {
        $validado_apellido = true;
    } else {
        $validado_apellido = false;
        $errores['apellido'] = "El apellido no es valido";
    }

    /*     * *********** VALIDANDO EMAIL *********** */
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $validado_email = true;
    } else {
        $validado_email = false;
        $errores['email'] = "El email no es valido o esta vacio";
    }

    /*     * *********** VALIDANDO PASSWORD *********** */
    if (!empty($password) && strlen($password) >= 8) {
        $validado_password = true;
    } else {
        $validado_password = false;
        $errores['password'] = "El password es muy corta";
    }

    var_dump($errores);

        /*     * *********** VALIDANDO QUE NO EXISTA ERRORES ANTES DE ENVIAR A LA BASE DE DATOS *********** */
    $guardarUsuario;
    if (count($errores) == 0) {
        $guardarUsuario = true;

        /*         * *********** CIFRANDO CONTRASEÑA *********** */
        $passord_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
        //var_dump($password);
        //var_dump($passord_segura);

        /*         * *********** VERIFICO QUE AMBAS CONTRASEÑAS SEAN IGUALES --> REGRESA TRUE *********** */
        //var_dump(password_verify($password, $passord_segura) );
        $sql = "INSERT INTO usuario values('null','$nombre','$apellido','$email','$passord_segura', CURRENT_DATE())";
        $guardar = mysqli_query($conn, $sql);

        if ($guardar) {
            $_SESSION['completado'] = "Registro guardado exitosamente..!";
        } else {
            $_SESSION['errores'] ['general'] = "Error al guardar registro";
        }
    } else {
        $_SESSION['errores'] = $errores;
    }
}

header('location: index.php');

