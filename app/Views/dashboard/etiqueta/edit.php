     <!-- incluyendo layout -->
     <?php $this->extend('Layouts/dashboard'); ?>

     <!-- Mostrando Contenido -->
     <?php $this->section('contenido'); ?>

       <!-- mostrando listado de errores -->
    <?php echo view('helpers/formulario-error'); ?>

     <!-- Formulario Creación Película -->
     <form action="/dashboard/etiqueta/update/<?php echo $etiqueta->id; ?>" method="POST">
         <!-- Incluyendo Formulario Editar -->
         <?php echo view('templates/formulario_tags', ['operacion' => 'Actualizar']); ?>
     </form>


     <?php $this->endSection(); ?>