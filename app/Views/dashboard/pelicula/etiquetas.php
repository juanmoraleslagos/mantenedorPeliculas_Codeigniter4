    <!-- incluyendo layout -->
    <?php $this->extend('Layouts/dashboard'); ?>

    <!-- Mostrando Contenido -->
    <?php $this->section('contenido'); ?>

    <!-- mostrando listado de errores -->
    <?php echo view('helpers/formulario-error'); ?>

    <!-- Formulario Creación Etiqueta -->
    <form action="" method="POST">
        <!-- Incluyendo Formulario Etiquetas -->
        <?php echo view('templates/formulario_etiqueta', ['operacion' => 'Crear Etiqueta']); ?>
    </form>

    <!-- agregando javascript-->
    <script>
        // función para desabilitar boton guardar etiquetas.
        function disableEnableButton() {
            if (document.querySelector('[name=etiqueta_id]').value == '') {
                document.querySelector('#btn_send').setAttribute('disabled', 'disabled');
            } else {
                document.querySelector('#btn_send').removeAttribute('disabled');
            }
        }

        // funcion para asignar etiquetas a peliculas.
        document.querySelector('[name=categoria_id]').onchange = function(event) {
            window.location.href = '<?= route_to('pelicula.etiquetas', $pelicula->id); ?>?categoria_id=' + this.value;
        }

        document.querySelector('[name=etiqueta_id]').onchange = function(event) {
            disableEnableButton();
        }

        // ejecutando función.
        disableEnableButton();

    </script>

    <?php $this->endSection(); ?>