    <!-- incluyendo layout -->
    <?php $this->extend('Layouts/dashboard'); ?>

    <!-- Mostrando Contenido -->
    <?php $this->section('contenido'); ?>

    <!-- incluyendo información categoría -->
    <h1><?php echo $pelicula->titulo; ?></h1>
    <p><?php echo $pelicula->descripcion; ?></p>

    <?php $this->endSection(); ?>