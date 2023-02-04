     <!-- incluyendo layout -->
    <?php $this->extend('Layouts/dashboard'); ?>

      <!-- Mostrando Contenido -->
      <?php $this->section('contenido'); ?>

    <!-- formulario categoría-->
    <form action="/dashboard/categoria/update/<?php echo $categoria['id']; ?>" method="POST">
        <?php echo view('templates/formulario_categoria', ['operacion' => 'Actualizar']); ?>
    </form>

    <?php $this->endSection(); ?>