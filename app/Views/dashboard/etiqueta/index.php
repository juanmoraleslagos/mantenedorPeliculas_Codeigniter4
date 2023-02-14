    <!-- Incluyendo Layout -->
    <?php $this->extend('Layouts/dashboard'); ?>

    <?php $this->section('header'); ?>
    Listado De Etiquetas
    <?php $this->endSection(); ?>

    <!-- Mostrando Contenido -->
    <?php $this->section('contenido'); ?>

    <a href="/dashboard/etiqueta/new">Crear</a>

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
                Opciones
            </th>
        </tr>
        <?php foreach ($etiquetas as $key => $etiqueta) : ?>
            <tr>
                <td><?php echo $etiqueta->id; ?></td>
                <td><?php echo $etiqueta->titulo; ?></td>
                <td><?php echo $etiqueta->categoria; ?></td>
                <td>
                    <a href="/dashboard/etiqueta/show/<?php echo $etiqueta->id; ?>" class="btn btn-secondary btn-sm mt-3">Mostrar</a>
                    <a href="/dashboard/etiqueta/edit/<?php echo $etiqueta->id; ?>" class="btn btn-primary btn-sm mt-3">Editar</a>

                    <!-- Creando Formulario Para Eliminar -->
                    <form action="/dashboard/etiqueta/delete/<?php echo $etiqueta->id; ?>" method="POST">
                        <button type="submit" class="btn btn-danger btn-sm mt-3">Borrar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php echo $pager->links(); ?>
    <?php $this->endSection(); ?>