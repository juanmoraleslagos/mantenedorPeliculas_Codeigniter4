<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas</title>
</head>

<body>
    <h1>Listado Películas</h1>

    <!-- Incluyendo Mensaje Flash -->
    <?php echo view('helpers/session'); ?>

    <a href="/dashboard/pelicula/new">Crear</a>

    <table>
        <tr>
            <th>
                Id
            </th>
            <th>
                Título
            </th>
            <th>
                Descripción
            </th>
            <th>
                Opciones
            </th>
        </tr>
        <?php foreach ($peliculas as $key => $pelicula) : ?>
            <tr>
                <td><?php echo $pelicula['id']; ?></td>
                <td><?php echo $pelicula['titulo']; ?></td>
                <td><?php echo $pelicula['descripcion']; ?></td>
                <td>
                    <a href="/dashboard/pelicula/show/<?php echo $pelicula['id']; ?>">Mostrar</a>
                    <a href="/dashboard/pelicula/edit/<?php echo $pelicula['id']; ?>">Editar</a>

                    <!-- Creando Formulario Para Eliminar -->
                    <form action="/dashboard/pelicula/delete/<?php echo $pelicula['id']; ?>" method="POST">
                        <button type="submit">Borrar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>