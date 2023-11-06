<?php 
function get_markup($formulario, $paso,$niveles,$datosForm){

    $output = '<h2>Paso: '.$paso.'/5</h2>';
    $pasoActual = $formulario[$paso];
    $output .='<form method="post" action="index.php">';
    $output .='<input type="hidden" name="paso" value="'.$paso.'">';



    foreach($pasoActual as $control => $campo ){

        
        if(isset($datosForm['musculo_a_mejorar'])){
            if(isset($campo['tipo']) && $campo['tipo'] == 'radio'){
                foreach($campo['opciones'] as $opcion => $musculo){
                    if($musculo == $datosForm['musculo_a_mejorar']){
                        $output .= '<input type="radio" name="'.$campo['name'].'" value="'.$musculo.'" checked';
                        $output .= '<label for="'.$campo['name'].'">'.$musculo.'</label>';
                    }else{
                        $output .= '<input type="radio" name="'.$campo['name'].'" value="'.$musculo.'">';
                        $output .= '<label for="'.$campo['name'].'">'.$musculo.'</label>';
                    }
                    
                }  
            }

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
    
    $output .= '</form>';
    return $output;
}


function imprimeDatos($datos){
    $output = '';
    $output = '<h2>Paso: 5/5</h2>';
    $output .= '<form method="post" action="index.php">'; 
    $output .='<input type="hidden" name="paso" value="5">';
    foreach($datos as $clave => $dato){
        if ($clave != 'anterior' && $clave != 'paso' && $clave != 'siguiente'){
            $output .= '<p>'.$clave.': '.$dato.' </p>';
        }
    }
    $output .= '<input type="submit" name="anterior" value="anterior">';
    $output .= '</form>';
    return $output;
}

?>