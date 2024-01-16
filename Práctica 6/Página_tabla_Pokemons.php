<?php
include_once 'consultas_y_conexion.php';

// Obtener la lista de pokemons
$sql = "SELECT * FROM pokemons";
$stmt = $conn->query($sql);
$pokemons = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <title>Tabla Pokemons</title>
</head>

<body>

    <style>
        body {
            background-image: url("Imagenes/pagina.jpeg");
            background-size: cover;
        }

        button {
            margin-top: 5%;
        }

        #formularios {
            display: flex;
            align-items: space;
            justify-content: center;
            margin: auto;


        }

        #formularioInsertarPokemon {
            margin-right: 5%;
            background-color: hsl(0, 0%, 100%, 0.7);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 250px;
            width: 100%;
        }

        #formularioActualizarPokemon {
            background-color: hsl(0, 0%, 100%, 0.7);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 250px;
            width: 100%;
        }



        /* Estilos para la tabla */
        table {
            margin-left: 10%;
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            color: #fff;
            background-color: #007bff;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        /* Estilos para las filas impares */
        tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        /* Estilos para los enlaces dentro de la tabla */
        a {
            color: #fff;
            text-decoration: none;
            cursor: pointer;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>


    <header>
        <h1 class="text-center mb-5 mt-2">POKEMONS</h1>

    </header>

    <main>
        <div id="formularios">
            <form id="formularioInsertarPokemon" action="Insertar_Pokemons.php" method="post">

                <label for="user">Nombre:</label><br>
                <input type="text" id="nombre" name="nombre" required><br>

                <label for="user">Primer Tipo:</label><br>
                <input type="text" id="primerTipo" name="primer_tipo" required><br>

                <label for="user">Segundo Tipo:</label><br>
                <input type="text" id="segundoTipo" name="segundo_tipo"><br>

                <label for="user">Generación:</label><br>
                <input type="text" id="generacion" name="generacion" required><br>

                <button id="botonRegister" class="btn btn-danger" type="submit">Enviar</button>
                <p id="alertaPokemon"></p>
            </form>

            <form id="formularioActualizarPokemon" action="Actualizar_Pokemons.php" method="post">


                <label for="user">Id:</label><br>
                <input type="number" id="id" name="id" required><br>

                <label for="user">Nombre:</label><br>
                <input type="text" id="nombre" name="nombre" required><br>

                <label for="user">Primer Tipo:</label><br>
                <input type="text" id="primerTipo" name="primer_tipo" required><br>

                <label for="user">Segundo Tipo:</label><br>
                <input type="text" id="segundoTipo" name="segundo_tipo"><br>

                <label for="user">Generación:</label><br>
                <input type="text" id="generacion" name="generacion" required><br>

                <button id="botonRegister" class="btn btn-danger" type="submit">Actualizar</button>
                <p id="alertaPokemon"></p>
            </form>
        </div>

        <h2 class="text-center mb-5 mt-2">Tabla de Pokémon</h2>

        <table>

            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Primer Tipo</th>
                <th>Segundo Tipo</th>
                <th>Generación</th>
            </tr>

            <?php foreach ($pokemons as $pokemon): ?>
                <tr>
                    <td>
                        <?php echo $pokemon['id']; ?>
                    </td>
                    <td>
                        <?php echo $pokemon['nombre']; ?>
                    </td>
                    <td>
                        <?php echo $pokemon['primer_tipo']; ?>
                    </td>
                    <td>
                        <?php echo $pokemon['segundo_tipo']; ?>
                    </td>
                    <td>
                        <?php echo $pokemon['generacion']; ?>
                    </td>
                    <td>
                        <a href="eliminar_pokemon.php?id=<?php echo $pokemon['id']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>






        <div class="container mt-5">
            <form id="salir" class="text-center" action="logout.php">
                <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
            </form>
        </div>


    </main>

    <footer>

    </footer>
</body>

</html>