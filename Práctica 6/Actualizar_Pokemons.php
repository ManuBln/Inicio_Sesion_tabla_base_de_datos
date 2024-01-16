<?php
session_start();
include_once("consultas_y_conexion.php");

if (isset($_POST["id"]) && isset($_POST["nombre"]) && isset($_POST["primer_tipo"]) && isset($_POST["generacion"])) {

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $primer_tipo = $_POST["primer_tipo"];
    $segundo_tipo = $_POST["segundo_tipo"];
    $generacion = $_POST["generacion"];

    Consultas::ActualizarTablaPokemon($id,$nombre, $primer_tipo, $segundo_tipo, $generacion);
    header("Location: Página_tabla_Pokemons.php");
    
}
?>