<?php

$nombreServidor = "localhost";
$userRoot = "root";
$passwordRoot = "";
$base_de_datos = "Practica9Servidores";

try {
    $conn = new PDO("mysql:host=$nombreServidor;dbname=$base_de_datos", $userRoot, $passwordRoot); //$conexion = mysqli_connect("localhost","root","","ejercicioservidor_cookies");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit();
}



class Consultas
{
    /*FUNCIONES PARA EL REGISTRO DE USUARIOO(INSERTAR EN LA TABLA) DE LA TABLA USUARIOS DE LA BBDD*/
    public static function RegistrarUsuario($user, $password, $email)
    {
        $nombreServidor = "localhost";
        $userRoot = "root";
        $passwordRoot = "";
        $base_de_datos = "Practica9Servidores";
        $conexion = mysqli_connect($nombreServidor, $userRoot, $passwordRoot, $base_de_datos) or die("Conexion incorrecta"); //Conexión a la base de datos

        // Encriptar la contraseña antes de insertarla en la base de datos
        $passwordHash = password_hash($password, PASSWORD_DEFAULT); //Se hashea la contraseña y la guardamos en la variable.

        $consultaInsertar = "INSERT INTO usuarios (Usuario, Contraseña, Email) VALUES (?, ?, ?)"; //Consulta que inserta los datos
        $stmtInsertar = mysqli_prepare($conexion, $consultaInsertar);
        mysqli_stmt_bind_param($stmtInsertar, 'sss', $user, $passwordHash, $email);
        mysqli_stmt_execute($stmtInsertar);
        mysqli_stmt_close($stmtInsertar);
        mysqli_close($conexion);



    }


    /*FUNCIONES PARA LA PÁGINA DE LA TABLA POKEMONS (CRUD)*/


    public static function InsertarTablaPokemon( $nombre, $primer_tipo, $segundo_tipo, $generacion)
    {
        $nombreServidor = "localhost";
        $userRoot = "root";
        $passwordRoot = "";
        $base_de_datos = "Practica9Servidores";
        $conexion = mysqli_connect($nombreServidor, $userRoot, $passwordRoot, $base_de_datos) or die("Conexion incorrecta");

        $consultaInsertar = "INSERT INTO pokemons  (nombre, primer_tipo, segundo_tipo, generacion) VALUES (?,?,?,?)"; //Consulta que inserta los datos
        $stmtInsertar = mysqli_prepare($conexion, $consultaInsertar);
        mysqli_stmt_bind_param($stmtInsertar, 'sssi', $nombre, $primer_tipo, $segundo_tipo, $generacion);
        mysqli_stmt_execute($stmtInsertar);
        mysqli_stmt_close($stmtInsertar);
        mysqli_close($conexion);




    }
    public static function ActualizarTablaPokemon( $id,$nombre, $primer_tipo, $segundo_tipo, $generacion)
    {
        $nombreServidor = "localhost";
        $userRoot = "root";
        $passwordRoot = "";
        $base_de_datos = "Practica9Servidores";
        $conexion = mysqli_connect($nombreServidor, $userRoot, $passwordRoot, $base_de_datos) or die("Conexion incorrecta");

        $consultaActualizar = "UPDATE pokemons SET nombre = ?, primer_tipo = ?, segundo_tipo = ?, generacion = ? WHERE id = ?"; //Consulta que actualiza los datos
        $stmtActualizar = mysqli_prepare($conexion, $consultaActualizar);
        mysqli_stmt_bind_param($stmtActualizar, 'sssii', $nombre, $primer_tipo, $segundo_tipo, $generacion,$id);
        mysqli_stmt_execute($stmtActualizar);
        mysqli_stmt_close($stmtActualizar);
        mysqli_close($conexion);




    }
    
 



    public static function MostrarTabla()
    {
        $nombreServidor = "localhost";
        $userRoot = "root";
        $passwordRoot = "";
        $base_de_datos = "Practica9Servidores";
        $conexion = mysqli_connect($nombreServidor, $userRoot, $passwordRoot, $base_de_datos) or die("Conexion incorrecta");




    }









}



?>