    <!-- incluyendo layout -->
    <?php $this->extend('Layouts/dashboard'); ?>

    <!-- Mostrando Contenido -->
    <?php $this->section('contenido'); ?>

    <!-- incluyendo información categoría -->
    <h1><?php echo $etiqueta->titulo; ?></h1>  

    <?php $this->endSection(); ?>