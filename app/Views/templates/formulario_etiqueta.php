<div class="mb-3">
    <!-- listado categorias -->
    <label class="form-label" for="categoria_id">Categorías</label>
    <select class="form-control" name="categoria_id" id="categoria_id">
        <option value="">Seleccione Categoría</option>
        <?php foreach ($categorias as $categoria) : ?>
            <option <?= $categoria->id != $categoria_id ?: 'selected' ?> value="<?= $categoria->id; ?>"><?= $categoria->titulo; ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div class="mb-3">
    <!-- listado etiquetas -->
    <label class="form-label" for="etiqueta_id">Etiquetas</label>
    <select class="form-control" name="etiqueta_id" id="etiqueta_id">
        <option value="">Seleccione Etiqueta</option>
        <?php foreach ($etiquetas as $etiqueta) : ?>
            <option value="<?= $etiqueta->id; ?>"><?= $etiqueta->titulo; ?></option>
        <?php endforeach; ?>
    </select>
</div>

<button type="submit" id="btn_send" class="btn btn-primary"><?php echo  $operacion; ?></button>