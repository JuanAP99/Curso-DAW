<?php
include('../app/views/includes/header.tpl.php');
?>
<ul>
    <?php foreach($artistas as $artista): ?>
        <li><a href=".?path=artistas/ver/<?php echo $artista['id']; ?>"><?php echo $artista['nombre']; ?></a> <a href="./index.php?path=artistas/borrar/<?php echo $artista['id']; ?>">Borrar</a></li>
    <?php endforeach; ?>
</ul>
<p><a href="./index.php?path=artistas/incluir">Incluir artistas</a></p>
<p><a href="./index.php?path=conciertos/listar">Ver conciertos</a></p>
<?php
include('../app/views/includes/footer.tpl.php');
?>
