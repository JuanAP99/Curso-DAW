<?php
include('../app/views/includes/header.tpl.php');
?>
 <h2>Actualizar artista</h2>
 <?php foreach($artistas as $artista): ?>
<form method="post" action=".?path=artistas/procesarActualizar">
    <label for="nombre">ID:</label>
    <input type="number" name="id" value="<?php echo $artista['id']; ?>" required>
    <br>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $artista['nombre']; ?>" required>
    <br>
    <label for="genero">Género:</label>
    <input type="text" name="genero" value="<?php echo $artista['genero']; ?>" required>
    <br>
    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" name="fecha_nacimiento" value="<?php echo $artista['fecha_nacimiento']; ?>" required>
    <br>
    <label for="precio_bolo">Precio del Bolo:</label>
    <input type="text" name="precio_bolo" value="<?php echo $artista['precio_bolo']; ?>" required>
    <br>
    <label for="localidad_nacimiento">Localidad de Nacimiento:</label>
    <input type="text" name="localidad_nacimiento" value="<?php echo $artista['localidad_nacimiento']; ?>" required>
    <br>
    <input type="submit" name="actualizar" value="Actualizar Artista">
</form>
<?php endforeach; ?>
<?php
include('../app/views/includes/footer.tpl.php');
?>