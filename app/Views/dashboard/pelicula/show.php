    <!-- incluyendo layout -->
    <?php $this->extend('Layouts/dashboard'); ?>

    <!-- Mostrando Contenido -->
    <?php $this->section('contenido'); ?>

    <!-- incluyendo información categoría -->
    <h1><?php echo $pelicula->titulo; ?></h1>
    <h3>Descripción</h3>
    <p><?php echo $pelicula->descripcion; ?></p>

    <!-- Incluyendo Imagenes -->
    <h3>Imagénes</h3>
    <ul>
        <?php foreach ($imagenes as $imagen) : ?>
            <li>
                <img src="/uploads/peliculas/<?= $imagen->imagen; ?>" alt="" width="150">
                <form action="<?= route_to('pelicula.borrar_imagen', $imagen->id) ?>" method="POST">
                    <button type="submit">Borrar</button>
                </form>
                <form action="<?= route_to('pelicula.descargar_imagen', $imagen->id) ?>" method="GET">
                    <button type="submit">Descargar</button>
                </form>
            </li>
        <?php endforeach ?>
    </ul>

    <!-- incluyendo etiquetas -->
    <h3>Etiquetas</h3>
    <ul>
        <?php foreach ($etiquetas as $etiqueta) : ?>
            <form action="<?= route_to('pelicula.etiqueta_delete', $pelicula->id, $etiqueta->id); ?>" method="POST">
                <button type="submit"><?= $etiqueta->titulo ?></button>
            </form>
        <?php endforeach ?>
    </ul>

    <?php $this->endSection(); ?>