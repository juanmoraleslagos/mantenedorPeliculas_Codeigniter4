<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Película</title>
</head>

<body>

    <!-- Formulario Creación Película -->
    <form action="/pelicula/update/<?php echo $pelicula['id']; ?>" method="POST">
        <!-- Incluyendo Formulario Editar -->
        <?php echo view('templates/formulario', ['operacion' => 'Actualizar']); ?>
    </form>

</body>

</html>