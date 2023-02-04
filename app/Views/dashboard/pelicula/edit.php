     <!-- incluyendo layout -->
     <?php $this->extend('Layouts/dashboard'); ?>

     <!-- Mostrando Contenido -->
     <?php $this->section('contenido'); ?>

     <!-- Formulario Creación Película -->
     <form action="/dashboard/pelicula/update/<?php echo $pelicula['id']; ?>" method="POST">
         <!-- Incluyendo Formulario Editar -->
         <?php echo view('templates/formulario', ['operacion' => 'Actualizar']); ?>
     </form>


     <?php $this->endSection(); ?>