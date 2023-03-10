    <!-- Incluyendo Layout -->
    <?php $this->extend('Layouts/dashboard'); ?>

    <?php $this->section('header'); ?>
    Listado De Categorías
    <?php $this->endSection(); ?>

    <!-- Mostrando Contenido -->
    <?php $this->section('contenido'); ?>

    <a href="/dashboard/categoria/new">Crear</a>
    <table class="table">
        <tr>
            <th>
                Id
            </th>
            <th>
                Título
            </th>
            <th>
                Opciones
            </th>
        </tr>
        <?php foreach ($categorias as $key => $categoria) : ?>
            <tr>
                <td><?php echo $categoria->id; ?></td>
                <td><?php echo $categoria->titulo; ?></td>
                <td>
                    <a href="/dashboard/categoria/show/<?php echo $categoria->id; ?>" class="btn btn-secondary btn-sm">Mostrar</a>
                    <a href="/dashboard/categoria/edit/<?php echo $categoria->id; ?>" class="btn btn-primary btn-sm">Editar</a>

                    <!-- Creando Formulario Para Eliminar -->
                    <form action="/dashboard/categoria/delete/<?php echo $categoria->id; ?>" method="POST">
                        <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php echo $pager->links(); ?>

    <?php $this->endSection(); ?>