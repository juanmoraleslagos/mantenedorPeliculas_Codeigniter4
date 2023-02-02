<label for="titulo">Título</label>
<input type="text" id="titulo" name="titulo" placeholder="Título Película" value="<?php echo $pelicula['titulo']; ?>">

<label for="descripcion">Descripción</label>
<textarea name="descripcion" id="descripcion"><?php echo $pelicula['descripcion']; ?></textarea>

<button type="submit"><?php echo  $operacion; ?></button>