<?php 

function generaChecksBox($videojuegos){
    $output = '';

    $output .= '<form action="" method="post">';
   
   for ($i = 65; $i<91 ; $i++ ){
    $letra = chr($i);
    $output.= '<input type="checkbox"id="letter_'.$letra.'"name="inicial[]" value="'.$letra.'" >';
    $output .= '<label for="letter_'.$letra.'">'.$letra.'</label>';
   }
   $output .= '<br><input type="submit" name="enviar" value="Enviar"> ';
   $output .= '<input type="submit" name="reiniciar" value="Reiniciar">';

    $output.= '</form>';
    return $output;
}

function generaTablaFiltrada($videojuegos){

    $output = '';

    $output .= '<table>';
    $output .= '<tr>';
    $output .= '<th>Nombre:</th>';
    $output .= '<th>Fecha lanzamiento:</th>';
    $output .= '<th>Creador</th>';
    $output .= '</tr>';

    if(!isset($_POST['inicial'])){
        
       foreach($videojuegos as $videojuego){

            $output .= '<tr>';
            $output .= '<td>'.$videojuego['nombre'].' </td>';

            if(isset($videojuego['fecha'])){
                $output .= '<td>'.$videojuego['fecha'].' </td>';
            }else{
                $output .= '<td>'.$videojuego['anio'].' </td>';
            }

            $output .= '<td>'.$videojuego['creador'].' </td>';
            $output .= '</tr>';

       }
    }else{

        foreach($videojuegos as $videojuego){

            $nombre = $videojuego['nombre'];
            $Caracter = substr($nombre, 0,1);

            if(in_array($Caracter, $_POST['inicial'])){

                $output .= '<tr>';
                $output .= '<td>'.$videojuego['nombre'].' </td>';

                if(isset($videojuego['fecha'])){
                    $output .= '<td>'.$videojuego['fecha'].' </td>';
                }else{
                    $output .= '<td>'.$videojuego['anio'].' </td>';
                }
                $output .= '<td>'.$videojuego['creador'].' </td>';
                $output .= '</tr>';
            }
        }

        
    }

   
    $output .='</table>';

    return $output;

}

?>