<?php
session_start();
include_once("consultas_y_conexion.php");

if (isset($_POST["user"]) && isset($_POST["password"]) && isset($_POST["email"])) {

    $user = $_POST["user"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    Consultas::RegistrarUsuario($user, $password, $email);
    header('Location: index.html');
}
?>