<?php
include('../app/views/includes/header.tpl.php');
?>
<ul>

    <?php foreach($artistas as $artista): ?>
        <li><a href=".?path=artistas/ver/<?php echo $artista['id']; ?>"><?php echo $artista['nombre']; ?></a></li>
       <form method="post" action=".?path=artistas/borrar<?php echo $artista['id'] ?>" > 
            <input type="submit" name="borrar" value="Borrar">

       </form>
    <?php endforeach; ?>
    <form method="post" action=".?path=artistas/incluir<?php echo $artista['id'] ?>" > 
            <input type="submit" name="borrar" value="Borrar">

       </form>
</ul>
<?php
include('../app/views/includes/footer.tpl.php');
?>
