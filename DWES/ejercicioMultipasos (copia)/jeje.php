<?php

function get_markup($formulario, $paso,$niveles,$datosForm){

    $output = '<h2>Paso: '.$paso.'/5</h2>';
    $pasoActual = $formulario[$paso];
    $output .='<form method="post" action="index.php">';
    $output .='<input type="hidden" name="paso" value="'.$paso.'">';



    foreach($pasoActual as $control => $campo ){
        

        if (isset($datosForm['musculo_a_mejorar'])){
            /* Lógica para imprimir formulario dinamicamente y mirar que musculo tiene para mejorar */ 
        }else if(isset($datosForm['kilos']) && isset($datosForm['musculo_a_mejorar'])){
            /* Lógica para imprimir formulario y darle el value de los kilos introducidos */ 
        }else if (isset($datosForm['seleccion_Mejora'])){
            /* Lógica para imprimir formulario y que salga la seleccion que haya seleccionada*/
        }else if (isset($datosForm['Nombre']) && isset($datosForm['Email'])){
            /* Lógica para imprimir formulario y darle el value de nombre y email*/
        }else{
            if(isset($campo['tipo']) && $campo['tipo'] == 'radio'){
                foreach($campo['opciones'] as $opcion => $musculo){
                    $output .= '<input type="radio" name="'.$campo['name'].'" value="'.$musculo.'">';
                    $output .= '<label for="'.$campo['name'].'">'.$musculo.'</label>';
                }  
            }else if(isset($campo['tipo']) && $campo['tipo'] == 'submit'){
    
                if(isset($campo['tipo']) && $campo['name'] == 'siguiente'){
                    $output .= '<input type="submit" name="'.$campo['name'].'" value="siguiente">';
                    $paso++;
                }else{
                    $output .= '<input type="submit" name="'.$campo['name'].'" value="anterior">';
                }
            }else if(isset($campo['tipo']) && isset($campo['label']) && ($campo['tipo'] == 'number' || $campo['tipo'] == 'text')){
                    $output .= '<label for="'.$campo['name'].'">'.$campo['label'].'</label>';
                    $output .= '<input type="'.$campo['tipo'].'" name="'.$campo['name'].'" >';
            }
            if (isset($campo['name']) && $campo['name'] == 'seleccion_Mejora'){
    
                $output .='<h3>Mejora tus metas:</h3>';
    
                foreach ($niveles as $nivel){
                    $output .= '<p>'.$nivel.'</p>'; 
                }
                $output .= '<select name="'.$campo['name'].'">';
                foreach($campo['value'] as $valor){
                    $output .= '<option value="'.$valor.'">'.$valor.'</option>';
                }
                $output .= '</select>';
            }
           
        }
        }



    }

?>