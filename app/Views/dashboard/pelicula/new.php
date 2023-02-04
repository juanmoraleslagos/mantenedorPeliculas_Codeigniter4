    <!-- incluyendo layout -->
    <?php $this->extend('Layouts/dashboard'); ?>

    <!-- Mostrando Contenido -->
    <?php $this->section('contenido'); ?>

    <!-- Formulario Creación Película -->
    <form action="/dashboard/pelicula/create" method="POST">
        <!-- Incluyendo Formulario Editar -->
        <?php echo view('templates/formulario', ['operacion' => 'Crear']); ?>
    </form>

    <?php $this->endSection(); ?>