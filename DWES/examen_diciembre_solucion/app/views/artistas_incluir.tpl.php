<?php
include('../app/views/includes/header.tpl.php');
?>
<form action="./index.php?path=artistas/incluir" method="post">
    <label for="nombre_text">Nombre </label><input type="text" id="nombre_text" name="nombre">
    <label for="genero_select">Género</label> 
    <select class="form-control" id="genero_select" name="genero">
        <option value="">-- Elige uno --</option>
        <option value="flamenco">Flamenco</option> 
        <option value="sevillanas">Sevillanas</option>
        <option value="flamenco-rock">Flamenco - Rock</option>         
    </select>
    <label for="precio_bolo_number">Precio </label><input type="number" id="precio_bolo_number" name="precio_bolo" step="0.01" list="preciosSugeridos">
    <datalist id="preciosSugeridos">
        <option value="1000"></option>
        <option value="5000"></option>
        <option value="10000"></option>
        <option value="20000"></option>
        <option value="30000"></option>
    </datalist>
    <label for="localidad_nacimiento_text">Localidad </label><input type="text" id="localidad_nacimiento_text" name="localidad_nacimiento" list="localidadesSugeridas">
    <datalist id="localidadesSugeridas">
        <option value="Almería"></option>
        <option value="Cádiz"></option>
        <option value="Córdoba"></option>
        <option value="Granada"></option>
        <option value="Huelva"></option>
        <option value="Jaén"></option>
        <option value="Málaga"></option>
        <option value="Sevilla"></option>
    </datalist>
    <label for="fecha_nacimiento_date">Fecha nacimiento</label>
    <input type="date" id="fecha_nacimiento_date" name="fecha_nacimiento" min="1975-06-07" />
    <input type="submit" id="incluir_submit" name="incluir" value="Guardar">
    
</form>
<p><a href="./index.php?path=conciertos/listar">Ver conciertos</a></p>
<p><a href="./index.php?path=artistas/listar">Ver artistas</a></p>
<?php
include('../app/views/includes/footer.tpl.php');
?>
