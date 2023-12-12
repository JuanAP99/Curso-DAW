<?php
include('../app/views/includes/header.tpl.php');
?>
<ul>
<?php foreach($conciertos as $concierto): ?>

    <li><?php echo 'concierto con id: '.$concierto->getId() ?></li>

<?php endforeach; ?>
<li><a href=".?path=inicio/home">Volver</a></li>
</ul>
<?php
include('../app/views/includes/footer.tpl.php');
?>