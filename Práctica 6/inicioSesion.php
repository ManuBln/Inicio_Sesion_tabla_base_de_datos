 <?php

include_once 'consultas_y_conexion.php';

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = $_POST['user'] ?? '';
    $password = $_POST['password'] ?? '';


    
    // Realizar la consulta a la base de datos para verificar las credenciales
    $sql = "SELECT * FROM usuarios WHERE Usuario = :user";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user', $user);
    $stmt->execute();
    $userRecord = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($userRecord && password_verify($password, $userRecord['Contraseña'])) {
        // Iniciar sesión y redirigir a la página de inicio
        $_SESSION['loggedin'] = true;
        $_SESSION['user'] = $userRecord;
        header('Location: Página_tabla_Pokemons.php');
        exit();
    } else {
        header('Location:Index.html');
        $error = "Usuario o contraseña incorrectos";
    }
}






?> 