<?php
include('../app/views/includes/header.tpl.php');
?>
<table>
    <thead>
        <th>Nombre concierto</th>
        <th>Artista</th>
        <th>Fecha y hora</th>
    </thead>
    <?php foreach($conciertos as $concierto): ?>
        <tr>
            <td><?php echo $concierto['nombre_concierto']; ?></td>
            <td><?php echo $concierto['nombre_artista']; ?></td>
            <td><?php echo $concierto['fecha_hora']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<p><a href="./index.php?path=artistas/listar">Ver artistas</a></p>
<?php
include('../app/views/includes/footer.tpl.php');
?>
