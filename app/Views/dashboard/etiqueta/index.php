    <!-- Incluyendo Layout -->
    <?php $this->extend('Layouts/dashboard'); ?>

    <?php $this->section('header'); ?>
    Listado De Películas
    <?php $this->endSection(); ?>

    <!-- Mostrando Contenido -->
    <?php $this->section('contenido'); ?>

    <a href="/dashboard/etiqueta/new">Crear</a>

    <table>
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
                    <a href="/dashboard/etiqueta/show/<?php echo $etiqueta->id; ?>">Mostrar</a>
                    <a href="/dashboard/etiqueta/edit/<?php echo $etiqueta->id; ?>">Editar</a>

                    <!-- Creando Formulario Para Eliminar -->
                    <form action="/dashboard/etiqueta/delete/<?php echo $etiqueta->id; ?>" method="POST">
                        <button type="submit">Borrar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php $this->endSection(); ?>