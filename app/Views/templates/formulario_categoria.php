<label for="titulo">Título</label>
<input type="text" id="titulo" name="titulo" placeholder="Categoría Película" value="<?php echo old('titulo', $categoria['titulo']); ?>">

<button type="submit"><?php echo  $operacion; ?></button>