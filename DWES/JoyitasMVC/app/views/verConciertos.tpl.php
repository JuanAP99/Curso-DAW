<?php
include('../app/views/includes/header.tpl.php');
?>

<table>

    <tr>
        <th>id</th>
        <th>fecha</th>
        <th>lugar</th>
        <th>cod artista</th>
    </tr>
    <tr>
        <td>puteroo</td>;
    <?php /*foreach($conciertos as $concierto):
        $boton_update = ' <form method="post" action=".?path=artistas/actualizar/'.$concierto->getId().'"><input type="submit" name="actualizar" value="Actualizar"></form><br>';
        $boton_delete = '<form method="post" action=".?path=artistas/eliminar/'.$concierto->getId().'"><input type="submit" name="eliminar" value="Eliminar"></form>';
        echo '<td>'.$concierto->getId().'</td>';
        echo '<td>'.$concierto->getFecha().'</td>';
        echo '<td>'.$concierto->getLugar().'</td>';
        echo '<td>'.$concierto->getArtista().'</td>';
        echo '<td>'.$boton_update.' '.$boton_delete.'</td>';
        
    endforeach; */?>
    </tr>
</table>
<?php
include('../app/views/includes/footer.tpl.php');
?>