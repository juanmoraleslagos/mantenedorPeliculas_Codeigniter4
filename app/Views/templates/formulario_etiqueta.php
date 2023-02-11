    <!-- listado categorias -->
    <label for="categoria_id">Categorías</label>
    <select name="categoria_id" id="categoria_id">
        <option value="">Seleccione Categoría</option>
        <?php foreach ($categorias as $categoria) : ?>
            <option <?= $categoria->id != $categoria_id ?: 'selected' ?> value="<?= $categoria->id; ?>"><?= $categoria->titulo; ?></option>
        <?php endforeach; ?>
    </select>

    <!-- listado etiquetas -->
    <label for="etiqueta_id">Etiquetas</label>
    <select name="etiqueta_id" id="etiqueta_id">
        <option value="">Seleccione Etiqueta</option>
        <?php foreach ($etiquetas as $etiqueta) : ?>
            <option value="<?= $etiqueta->id; ?>"><?= $etiqueta->titulo; ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit" id="btn_send" ><?php echo  $operacion; ?></button>

