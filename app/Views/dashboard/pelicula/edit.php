     <!-- incluyendo layout -->
     <?php $this->extend('Layouts/dashboard'); ?>

     <!-- Mostrando Contenido -->
     <?php $this->section('contenido'); ?>

     <!-- mostrando listado de errores -->
     <?php echo view('helpers/formulario-error'); ?>

     <!-- Formulario Creación Película -->
     <form enctype="multipart/form-data" action="/dashboard/pelicula/update/<?php echo $pelicula->id; ?>" method="POST">
       <!-- Incluyendo Formulario Editar -->
       <?php echo view('templates/formulario', ['operacion' => 'Actualizar']); ?>
     </form>


     <?php $this->endSection(); ?>