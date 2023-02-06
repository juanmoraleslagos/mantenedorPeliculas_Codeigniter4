    <!-- incluyendo layout -->
    <?php $this->extend('Layouts/dashboard'); ?>

    <!-- Mostrando Contenido -->
    <?php $this->section('contenido'); ?>

    <!-- mostrando listado de errores -->
    <?php echo view('helpers/formulario-error'); ?>

    <!-- formulario crear categoría -->
    <form action="/dashboard/categoria/create" method="POST">
        <?php echo view('templates/formulario_categoria', ['operacion' => 'Crear']); ?>
    </form>

    <?php $this->endSection(); ?>