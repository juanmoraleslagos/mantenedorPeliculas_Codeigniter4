<label for="titulo">Título</label>
<input type="text" id="titulo" name="titulo" placeholder="Título Película" value="<?php echo old('titulo', $pelicula->titulo) ?>">

<label for="descripcion">Descripción</label>
<textarea name="descripcion" id="descripcion"><?php echo old('descripcion', $pelicula->descripcion) ?></textarea>

<button type="submit"><?php echo  $operacion; ?></button>