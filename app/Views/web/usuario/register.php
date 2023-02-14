    <!-- Incluyendo Layout -->
    <?php echo $this->extend('Layouts/web'); ?>

    <!-- Mostrando Contenido -->
    <?php echo  $this->section('contenido'); ?>

    <!-- mostrando mensajes validaciones -->
    <?= view('helpers/formulario-error'); ?>

    <div class="container mt-5">
        <h1 class="text-center mb-3">Formulario Registro</h1>
        <div class="card mx-auto d-block " style="max-width: 500px;">
            <div class="card-body">
                <!-- formulario login  -->
                <form action="<?= route_to('usuario.register_post') ?>" method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="usuario">Usuario</label>
                        <input class="form-control" type="text" name="usuario" id="usuario">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" type="text" name="email" id="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="contrasena">Contraseña</label>
                        <input class="form-control" type="password" name="contrasena" id="contrasena">
                    </div>
                    <div class="d-grid">
                        <input class="btn btn-primary btn-block" type="submit" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php echo $this->endSection(); ?>