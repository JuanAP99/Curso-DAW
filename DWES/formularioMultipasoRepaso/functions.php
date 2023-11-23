<?php

function get_markup($formulario, $paso){

    $output = '';

    $formPorPaso = $formulario[$paso];
    $output .= '<h2>Formulario mejora. paso: '.$paso.'/4</h2>';
    $output.= '<form method="post" action="index.php">';
    $output .= '<input type="hidden" name="paso" value="'.$paso.'">';

    foreach ($formPorPaso as $control => $campo){
        if(isset($campo['tipo']) && $control['tipo'] == 'radio'){
            foreach($campo['opciones'] as $value){
                $output .= '<input type="radio" name="musculo" value="'.$value.'">';
            }
        }elseif($control['tipo' == 'submit']){
            $output .= '<input type="submit" name="'.$campo['name'].' value="'.$campo['name'].'"">';
        }


    }

    $output .= '</form>';
}





?>