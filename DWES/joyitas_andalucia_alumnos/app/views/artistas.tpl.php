<?php
include('../app/views/includes/header.tpl.php');
?>
<h1>Listar artistas</h1>
<ul>

    <?php foreach($artistas as $artista): ?>
        <li><a href=".?path=artistas/ver/<?php echo $artista['id']; ?>"><?php echo $artista['nombre'] ; ?></a>
       <form method="post" action=".?path=artistas/borrarArtistaYSusConciertos" > 
               <input type="hidden" value="<?php echo $artista['id'] ?>" name="id_artista">
            <input type="submit" name="borrar" value="Borrar"></li>
       </form>
    <?php endforeach; ?>
   

       
</ul>
<?php
include('../app/views/includes/footer.tpl.php');
?>
