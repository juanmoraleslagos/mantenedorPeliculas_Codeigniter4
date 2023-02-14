<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo Web</title>

    <link rel="stylesheet" href="<?= base_url() ?>/bootstrap/css/bootstrap.min.css">

</head>

<body>
    <!-- Incluyendo Mensaje Flash -->
    <?php echo view('helpers/session'); ?>

    <!-- Renderizando Contenido -->
    <?php echo $this->renderSection('contenido'); ?>
</body>

</html>