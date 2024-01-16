<?php
include_once 'consultas_y_conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM pokemons WHERE id = :id";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id', $id);

    $stmt->execute();
    header("Location: Página_tabla_Pokemons.php");
    exit();
}
?>