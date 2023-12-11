<?php
include('../app/views/includes/header.tpl.php');
?>
 <h2>Actualizar artista</h2>
<form method="post" action=".?path=artistas/procesarActualizar">
    <label for="nombre">ID:</label>
    <input type="number" name="id" value="<?php echo $artista->getId(); ?>" required>
    <br>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $artista->getNombre(); ?>" required>
    <br>
    <label for="genero">Género:</label>
    <input type="text" name="genero" value="<?php echo $artista->getGenero(); ?>" required>
    <br>
    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" name="fecha_nacimiento" value="<?php echo $artista->getFechaNacimiento(); ?>" required>
    <br>
    <label for="precio_bolo">Precio del Bolo:</label>
    <input type="text" name="precio_bolo" value="<?php echo $artista->getPrecioBolo(); ?>" required>
    <br>
    <label for="localidad_nacimiento">Localidad de Nacimiento:</label>
    <input type="text" name="localidad_nacimiento" value="<?php echo $artista->getLocalidadNacimiento(); ?>" required>
    <br>
    <input type="submit" name="crear" value="Crear Artista">
</form>

<?php
include('../app/views/includes/footer.tpl.php');
?>