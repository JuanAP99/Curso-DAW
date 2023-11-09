<?php 

function seleccionProductos_markup($productos){

    $output = '';
    $output .= '<h2>Selección de producto</h2>';
    $output .= '<form action="carrito.php" method="post">';

    foreach($productos as $id => $campo){
        $output .= '<p>Producto nº'.$id.': '.$campo['nombre'].'</p>';
        $output .= '<label>Cantidad deseada: </label><br>';
        $output .= '<input type="number" name="cantidad_'.$campo['nombre'].'_'.$id.'"  >';
        
    }
    $output .= '<br><input type="submit" name="btnSeleccion" value="Ir al carrito">';
    $output .= '</form>';
    return $output;
}


/*aaººººººººººººººººººº */

?>