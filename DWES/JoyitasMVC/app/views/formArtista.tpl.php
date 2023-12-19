<?php
include('../app/views/includes/header.tpl.php');
?>
<h2>Crear nuevo artista</h2>
    <form method="post" action=".?path=artistas/procesarInsert">
        <label for="nombre">ID:</label>
        <input type="number" name="id" required>
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="genero">Género:</label>
        <input type="text" name="genero" required>
        <br>
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" required>
        <br>
        <label for="precio_bolo">Precio del Bolo:</label>
        <input type="text" name="precio_bolo" required>
        <br>
        <label for="localidad_nacimiento">Localidad de Nacimiento:</label>
        <input type="text" name="localidad_nacimiento" required>
        <br>
        <input type="submit" name="crear" value="Crear Artista">
    </form>
<?php
include('../app/views/includes/footer.tpl.php');
?>
