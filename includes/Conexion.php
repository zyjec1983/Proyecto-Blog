<?php

$db_server = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'blog';

$conn = mysqli_connect($db_server,
                        $db_user,
                        $db_pass,
                        $db_name);

mysqli_query($conn, "SET NAMES 'utf8'"); /*transforma a UTF8 todo lo que llega desde los formularios*/

if(!isset($_SESSION)){
    session_start();
}