<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría</title>
</head>

<body>

    <!-- Formulario Creación Película -->
    <form action="/dashboard/categoria/update/<?php echo $categoria['id']; ?>" method="POST">
        <!-- Incluyendo Formulario Editar -->
        <?php echo view('templates/formulario_categoria', ['operacion' => 'Actualizar']); ?>
    </form>

</body>

</html>