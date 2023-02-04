<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo De Dashboard</title>
</head>

<body>
    <!-- Renderizando Header -->
    <h1><?php $this->renderSection('header'); ?></h1>

    <!-- Incluyendo Mensaje Flash -->
    <?php echo view('helpers/session'); ?>

    <!-- Renderizando Contenido -->
    <?php $this->renderSection('contenido'); ?>
</body>

</html>