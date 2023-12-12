<?php
include('../app/views/includes/header.tpl.php');
?>
<ul>
<?php foreach($conciertos as $concierto): ?>

    <li><a href=".?path=conciertos/ver/<?php $concierto->getId() ?>"><?php echo 'concierto con id: '.$concierto->getId() ?></a></li>

<?php endforeach; ?>
<li><a href=".?path=inicio/home">Volver</a></li>
</ul>
<?php
include('../app/views/includes/footer.tpl.php');
?>