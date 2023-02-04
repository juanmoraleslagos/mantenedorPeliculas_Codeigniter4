    <!-- incluyendo layout -->
    <?php $this->extend('Layouts/dashboard'); ?>

    <!-- Mostrando Contenido -->
    <?php $this->section('contenido'); ?>

    <!-- formulario crear categoría -->
    <form action="/dashboard/categoria/create" method="POST">
        <?php echo view('templates/formulario_categoria', ['operacion' => 'Crear']); ?>
    </form>

    <?php $this->endSection(); ?>