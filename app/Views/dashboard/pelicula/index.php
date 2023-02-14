    <!-- Incluyendo Layout -->
    <?php $this->extend('Layouts/dashboard'); ?>

    <?php $this->section('header'); ?>
    Listado De Películas
    <?php $this->endSection(); ?>

    <!-- Mostrando Contenido -->
    <?php $this->section('contenido'); ?>

    <a class="btn btn-success btn-lg mb-4 " href="/dashboard/pelicula/new">Crear</a>

    <table class="table">
        <tr>
            <th>
                Id
            </th>
            <th>
                Título
            </th>
            <th>
                Categoría
            </th>
            <th>
                Descripción
            </th>
            <th>
                Opciones
            </th>
        </tr>
        <?php foreach ($peliculas as $key => $pelicula) : ?>
            <tr>
                <td><?php echo $pelicula->id; ?></td>
                <td><?php echo $pelicula->titulo; ?></td>
                <td><?php echo $pelicula->categoria; ?></td>
                <td><?php echo $pelicula->descripcion; ?></td>
                <td>
                    <a href="/dashboard/pelicula/show/<?php echo $pelicula->id; ?>" class="btn btn-secondary mt-3">Mostrar</a>
                    <a href="/dashboard/pelicula/edit/<?php echo $pelicula->id; ?>" class="btn btn-primary mt-3">Editar</a>
                    <a href="<?= route_to('pelicula.etiquetas', $pelicula->id); ?>" class="btn btn-primary mt-3">Etiquetas</a>

                    <!-- Creando Formulario Para Eliminar -->
                    <form action="/dashboard/pelicula/delete/<?php echo $pelicula->id; ?>" method="POST">
                        <button type="submit" class="btn btn-danger mt-3">Borrar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

    <?php echo $pager->links(); ?>

    <?php $this->endSection(); ?>