<?php
include('../app/views/includes/header.tpl.php');


?>
<ul>
    
    <table>

        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Genero</th>
            <th>Fecha de nacimiento</th>
            <th>Precio Bolo</th>
            <th>Localidad de nacimiento</th>
            <th>Acciones</th>
        </tr>
        <tr>
            <?php 
                foreach($artistas as $artista):
                   $boton_update = ' <form method="post" action=".?path=artistas/actualizar/'.$artista['id'].'"><input type="submit" name="actualizar" value="Actualizar"></form><br>';
                   $boton_delete = '<form method="post" action=".?path=artistas/eliminar/'.$artista['id'].'"><input type="submit" name="eliminar" value="Eliminar"></form>';
                   echo ' <td>'.$artista['id'].'</td>';
                   echo ' <td>'.$artista['nombre'].'</td>';
                   echo ' <td>'.$artista['genero'].'</td>';
                   echo ' <td>'.$artista['fecha_nacimiento'].'</td>';
                   echo ' <td>'.$artista['precio_bolo'].'</td>';
                   echo ' <td>'.$artista['localidad_nacimiento'].'</td>';
                   echo ' <td>'.$boton_update . $boton_delete . '  </td>';
                    
            ?>
            
        </tr>
        <?php endforeach ?>

    </table>

</ul>
<?php
include('../app/views/includes/footer.tpl.php');
?>

