            <div class="mb-3">
                <label class="form-label" for="titulo">Título</label>
                <input class="form-control" type="text" id="titulo" name="titulo" placeholder="Título Película" value="<?php echo old('titulo', $pelicula->titulo) ?>">
            </div>            
            <div class="mb-3">
                <label class="form-label" for="categoria_id">Categoría</label>
                <select class="form-control" name="categoria_id" id="categoria_id">
                    <option value="">Seleccione Categoría</option>
                    <?php foreach ($categorias as $categoria) : ?>
                        <option <?= $categoria->id !== old('categoria_id', $pelicula->categoria_id) ?: 'selected'; ?> value="<?= $categoria->id; ?>"><?= $categoria->titulo; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="descripcion">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion"><?php echo old('descripcion', $pelicula->descripcion) ?></textarea>
            </div>
            <div class="mb-3">
                <?php if ($pelicula->id) : ?>
                    <label class="form-label" for="imagen">Imagen</label>
                    <input class="form-control" type="file" name="imagen" id="imagen">
                <?php endif ?>
            </div>

            <button type="submit" class="btn btn-primary"><?php echo  $operacion; ?></button>