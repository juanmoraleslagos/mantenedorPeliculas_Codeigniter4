<label for="titulo">Título</label>
<input type="text" id="titulo" name="titulo" placeholder="Título Película" value="<?php echo old('titulo', $pelicula->titulo) ?>">

<label for="categoria_id">Categoría</label>
<select name="categoria_id" id="categoria_id">
    <option value="">Seleccione Categoría</option>
    <?php foreach ($categorias as $categoria) : ?>
        <option <?= $categoria->id !== old('categoria_id', $pelicula->categoria_id) ?:'selected'; ?> value="<?= $categoria->id; ?>"><?= $categoria->titulo; ?></option>
    <?php endforeach; ?>
</select>

<label for="descripcion">Descripción</label>
<textarea name="descripcion" id="descripcion"><?php echo old('descripcion', $pelicula->descripcion) ?></textarea>

<button type="submit"><?php echo  $operacion; ?></button>