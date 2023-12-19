<?php
include('../app/views/includes/header.tpl.php');
?>
<h3>¿Está seguro que desea borrar el artista <?php echo $id; ?>?</h3>
<form action="./index.php?path=artistas/borrar/<?php echo $id; ?>" method="post">
    <input type="submit" id="incluir_submit" name="confirmar" value="Confirmar">
</form>
<p><a href="./index.php?path=conciertos/listar">Ver conciertos</a></p>
<p><a href="./index.php?path=artistas/listar">Ver artistas</a></p>
<?php
include('../app/views/includes/footer.tpl.php');
?>
