    <!-- incluyendo layout -->
    <?php $this->extend('Layouts/dashboard'); ?>

    <!-- Mostrando Contenido -->
    <?php $this->section('contenido'); ?>

    <!-- mostrando listado de errores -->
    <?php echo view('helpers/formulario-error'); ?>

    <!-- Formulario Creación Película -->
    <form action="/dashboard/pelicula/create" method="POST">
        <!-- Incluyendo Formulario Editar -->
        <?php echo view('templates/formulario', ['operacion' => 'Crear']); ?>
    </form>

    <?php $this->endSection(); ?>