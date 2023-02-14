<div class="mb-3">
    <label class="form-label" for="titulo">Título</label>
    <input class="form-control" type="text" id="titulo" name="titulo" placeholder="Título Película" value="<?php echo old('titulo', $etiqueta->titulo) ?>">
</div>
<div class="mb-3">
    <label class="form-label" for="categoria_id">Categoría</label>
    <select class="form-control" name="categoria_id" id="categoria_id">
        <option value="">Seleccione Categoría</option>
        <?php foreach ($categorias as $categoria) : ?>
            <option <?= $categoria->id !== old('categoria_id', $etiqueta->categoria_id) ?: 'selected'; ?> value="<?= $categoria->id; ?>"><?= $categoria->titulo; ?></option>
        <?php endforeach; ?>
    </select>
</div>

<button type="submit" class="btn btn-primary"><?php echo  $operacion; ?></button>