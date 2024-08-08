<?php

// iniciar sesion y conexion a la base d3e datos
require_once 'includes/Conexion.php';

// recoger datos de la base de datos
if (isset($_POST)) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // CONSULTA PARA COMPROBAR LAS CREDENCIALES DEL USUARIO
    $query = "SELECT * FROM usuario WHERE email = '$email'";
    $login = mysqli_query($conn, $query);

    if ($login && mysqli_num_rows($login) == 1) {
        $usuario = mysqli_fetch_assoc($login);

//        Verifico que se carguen datos desde la base de datos
//        var_dump($usuario);
//        die();
        // comprobar contraseña
        $verify = password_verify($password, $usuario['password']);

        if ($verify) {
            // UTILIZAR UNA SESION PARA GUARDAR  LOS DATOS DEL USUARIO
            $_SESSION['usuario'] = $usuario;

            // SI ALGO FALLA ENVIAR UNA SESION CON FALLO
            if (isset($_SESSION['error_login'])) {
                session_unset($_SESSION['error_login']);
            }
        } // IF (VERIFY) ENDS
        else {
            $_SESSION['error_login'] = "Login incorrecto";
        }
    } // IF EXTERIOR ENDS
    else {
        $_SESSION['error_login'] = "Login incorrecto";
    }
} // IF (ISSET) POST 
// REDIRIGIR A INDEX.PHP
header('Location: index.php');

