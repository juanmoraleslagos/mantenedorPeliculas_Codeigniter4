<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo De Dashboard</title>

    <link rel="stylesheet" href="<?= base_url() ?>/bootstrap/css/bootstrap.min.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg mb-3">
        <div class="container-fluid">
            <div class="navbar-brand">CodeIngniter 4</div>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?= base_url() ?>/dashboard/categoria" class="nav-link">Categoría</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>/dashboard/pelicula" class="nav-link">Películas</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>/dashboard/etiqueta" class="nav-link">Etiquetas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <!-- Renderizando Header -->                
                <h1><?php echo $this->renderSection('header'); ?></h1>
            </div>
            <div class="card-body">
                <!-- Incluyendo Mensaje Flash -->
                <?php echo view('helpers/session'); ?>

                <!-- Renderizando Contenido -->
                <?php echo $this->renderSection('contenido'); ?>
            </div>
        </div>
    </div>

    <!-- Añadiendo Archivos Javascript -->
    <script src="<?= base_url() ?>/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>