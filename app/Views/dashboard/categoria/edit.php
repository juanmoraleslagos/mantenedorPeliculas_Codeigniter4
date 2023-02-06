     <!-- incluyendo layout -->
     <?php $this->extend('Layouts/dashboard'); ?>

     <!-- Mostrando Contenido -->
     <?php $this->section('contenido'); ?>

     <!-- mostrando listado de errores -->
     <?php echo view('helpers/formulario-error'); ?>

     <!-- formulario categoría-->
     <form action="/dashboard/categoria/update/<?php echo $categoria->id; ?>" method="POST">
       <?php echo view('templates/formulario_categoria', ['operacion' => 'Actualizar']); ?>
     </form>

     <?php $this->endSection(); ?>