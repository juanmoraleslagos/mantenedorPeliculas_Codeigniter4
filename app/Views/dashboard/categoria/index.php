<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
</head>

<body>
    <h1>Listado Categorías</h1>

    <a href="/dashboard/categoria/new">Crear</a>

    <table>
        <tr>
            <th>
                Id
            </th>
            <th>
                Título
            </th>
            <th>
                Opciones
            </th>
        </tr>
        <?php foreach ($categorias as $key => $categoria) : ?>
            <tr>
                <td><?php echo $categoria['id']; ?></td>
                <td><?php echo $categoria['titulo']; ?></td>
                <td>
                    <a href="/dashboard/categoria/show/<?php echo $categoria['id']; ?>">Mostrar</a>
                    <a href="/dashboard/categoria/edit/<?php echo $categoria['id']; ?>">Editar</a>

                    <!-- Creando Formulario Para Eliminar -->
                    <form action="/dashboard/categoria/delete/<?php echo $categoria['id']; ?>" method="POST">
                        <button type="submit">Borrar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>