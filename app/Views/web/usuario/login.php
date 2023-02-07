    <!-- Incluyendo Layout -->
    <?php echo $this->extend('Layouts/web'); ?>

    <!-- Mostrando Contenido -->
    <?php echo  $this->section('contenido'); ?>

    <!-- mostrando mensajes validaciones -->
    <?= view('helpers/formulario-error'); ?>

    <!-- formulario login  -->
    <form action="<?= route_to('usuario.login_post') ?>" method="POST">

        <label for="email">Usuario/Email</label>
        <input type="text" name="email" id="email">

        <label for="contrasena">Contraseña</label>
        <input type="password" name="contrasena" id="contrasena">

        <input type="submit" value="Enviar">

    </form>

    <?php echo $this->endSection(); ?>