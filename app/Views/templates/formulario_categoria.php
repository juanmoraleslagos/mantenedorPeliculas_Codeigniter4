<div class="mb-3">
    <label class="form-label" for="titulo">Título</label>
    <input class="form-control" type="text" id="titulo" name="titulo" placeholder="Categoría Película" value="<?php echo old('titulo', $categoria->titulo); ?>">
</div>
<button type="submit" class="btn btn-primary"><?php echo  $operacion; ?></button>