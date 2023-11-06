<?php

function get_markup($formulario, $paso){

    $output = '<h2>Paso: '.$paso.'/5</h2>';
    $pasoActual = $formulario[$paso];
    $output .='<form method="post" action="index.php">';
    $output .='<input type="hidden" name="paso" value="'.$paso.'">';
    foreach($pasoActual as $control => $campo ){

        if(isset($campo['tipo']) && $campo['tipo'] == 'radio'){

            foreach($campo['opciones'] as $opcion => $musculo){
                if(isset($_SESSION['musculo_a_mejorar']) && $_SESSION['musculo_a_mejorar'] == $musculo){
                    $output .= '<input type="radio" name="'.$campo['name'].'" value="'.$musculo.'" checked>';
                }else{
                    $output .= '<input type="radio" name="'.$campo['name'].'" value="'.$musculo.'">';
                }
                
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
            if(isset($_SESSION[$campo['name']])  ){
                $output .= '<input type="'.$campo['tipo'].'" name="'.$campo['name'].'" value="'.$_SESSION[$campo['name']].'">';
            }else{
                $output .= '<input type="'.$campo['tipo'].'" name="'.$campo['name'].'" >';
            }               
        }
        if (isset($campo['name']) && $campo['name'] == 'seleccion_Mejora'){

            $output .='<h3>Mejora tus metas:</h3>';
            $output .= '<select name="'.$campo['name'].'">';
            foreach($campo['value'] as $valor){
                if (isset($_SESSION['seleccion_Mejora']) && $_SESSION['seleccion_Mejora'] == $valor){
                    $output .= '<option value="'.$valor.'" selected>'.$valor.'</option>';
                }else{
                    $output .= '<option value="'.$valor.'">'.$valor.'</option>';
                }
            }
            $output .= '</select>';
        }
       
    }
    
    $output .= '</form>';
    return $output;
}
function dame_nivel(){

    $nivel = '';
    if (isset($_SESSION['kilos']) && isset($_SESSION['repeticiones'])){
        $kilos = $_SESSION['kilos'];
        $repeticiones = $_SESSION['repeticiones'];
    
        if ($kilos < 10 && $repeticiones< 10){
            $nivel = 'principiante';
        }else if(($kilos >= 10 || $kilos <30) && ($repeticiones>= 10 || $repeticiones<30)){
            $nivel = 'intermedio';
        }else if($kilos >=30  && $repeticiones>= 30){
            $nivel = 'pro';
        }
    }else{

    }
    return $nivel;
}

function dame_plan($nivel){


$cadena = '';
$kilos = 0;
$repeticiones = 0;

if (isset($_SESSION['seleccion_Mejora'])){

    $cadena .= 'Según los datos introducidos tienes un nivel es: '.$nivel.'';
    $cadena .= '<br>';
    $cadena .= 'Tu estado actual es:  ';
    $cadena .= '<br>';
    $cadena .= 'Kilos levantados : '.$_SESSION['kilos'].'';
    $cadena .= '<br>';
    $cadena .= 'Repeticiones máximas: '.$_SESSION['repeticiones'].'';
    $cadena .= '<br>';

        if($_SESSION['seleccion_Mejora'] == 'Mejorar repeticiones')  {
            $cadena .= 'Has seleccionado mejorar repeticiones. ';
            $cadena .= '<br>';
           if($nivel == 'principiante'){
            $kilos = $_SESSION['kilos'] + 5;
            $repeticiones = $_SESSION['repeticiones'] +10 ;
            $cadena .= 'Mejora en el plazo de un mes y medio a levantar '.$kilos.' kg y en realizar '.$repeticiones.' reps ';
            $cadena .= '<br>';
            $cadena .= 'Enfocate en mejorar la técnica de entreno';
            $cadena .= '<br>';
           }else  if($nivel == 'intermedio'){
            $kilos = $_SESSION['kilos'] + 10;
            $repeticiones = $_SESSION['repeticiones'] +15 ;
            $cadena .= 'Mejora en el plazo de un mes a levantar '.$kilos.' kg y en realizar '.$repeticiones.' reps';
            $cadena .= '<br>';
           }else if($nivel == 'pro'){
            $kilos = $_SESSION['kilos'] + 12;
            $repeticiones = $_SESSION['repeticiones'] +20 ;
            $cadena .= 'Mejora en el plazo de un mes a levantar '.$kilos.' kg y en realizar '.$repeticiones.' reps';
            $cadena .= '<br>';
           }


        }else if ($_SESSION['seleccion_Mejora'] == 'Mejorar fuerza'){
            $cadena .= 'Has seleccionado mejorar fuerza. ';
            $cadena .= '<br>';
            if($nivel == 'principiante'){
                $kilos = $_SESSION['kilos'] + 7;
                $repeticiones = $_SESSION['repeticiones'] +2 ;
                $cadena .= 'Mejora en el plazo de un mes y medio a levantar '.$kilos.' kg y en realizar '.$repeticiones.' reps ';
                $cadena .= '<br>';
                $cadena .= 'Enfocate en mejorar la técnica de entreno';
                $cadena .= '<br>';
               }else  if($nivel == 'intermedio'){
                $kilos = $_SESSION['kilos'] + 15;
                $repeticiones = $_SESSION['repeticiones'] +2 ;
                $cadena .= 'Mejora en el plazo de un mes a levantar '.$kilos.' kg y en realizar '.$repeticiones.' reps';
                $cadena .= '<br>';
               }else if($nivel == 'pro'){
                $kilos = $_SESSION['kilos'] + 15;
                $repeticiones = $_SESSION['repeticiones'] +5 ;
                $cadena .= 'Mejora en el plazo de un mes a levantar '.$kilos.' kg y en realizar '.$repeticiones.' reps';
                $cadena .= '<br>';
               }

        }else if($_SESSION['seleccion_Mejora'] == 'Mejorar todo'){
            $cadena .= 'Has seleccionado mejorar todo. ';
            $cadena .= '<br>';
            if($nivel == 'principiante'){
                $kilos = $_SESSION['kilos'] + 10;
                $repeticiones = $_SESSION['repeticiones'] +10 ;
                $cadena .= 'Mejora en el plazo de un mes y medio a levantar '.$kilos.' kg y en realizar '.$repeticiones.' reps ';
                $cadena .= 'Enfocate en mejorar la técnica de entreno';
                $cadena .= '<br>';
                
               }else  if($nivel == 'intermedio'){
                $kilos = $_SESSION['kilos'] + 15;
                $repeticiones = $_SESSION['repeticiones'] +15 ;
                $cadena .= 'Mejora en el plazo de un mes a levantar '.$kilos.' kg y en realizar '.$repeticiones.' reps';
                $cadena .= '<br>';
               }else if($nivel == 'pro'){
                $kilos = $_SESSION['kilos'] + 15;
                $repeticiones = $_SESSION['repeticiones'] +20 ;
                $cadena .= 'Mejora en el plazo de un mes a levantar '.$kilos.' kg y en realizar '.$repeticiones.' reps';
                $cadena .= '<br>';
               }
        }
    }

    return $cadena;

}

/* dame_ plan devuelve una cadena de texto dependiendo de que plan y repes y kilos haya metido, despues en el index lo tengo que añadir a la variable de sesion formulario para imprimirla
con el imprime datos (esta en beta) */

function imprimeDatos($datos){
    $output = '';
    $output = '<h2>Paso: 5/5</h2>';
    $output .= '<form method="post" action="index.php">'; 
    $output .='<input type="hidden" name="paso" value="5">';
    /* esto no me vale
    foreach($datos as $clave => $valor){
        if ($clave != 'anterior' && $clave != 'paso' && $clave != 'siguiente'){

            if($clave == )

            $output .= '<p>'.$clave.': '.$valor.' </p>';
        }
    } */ 

    $output.= 'Su nombre es: '.$_SESSION['Nombre'].'<br>
               Su email es:  '.$_SESSION['Email'].'<br> '.$datos;

    $output .= '<input type="submit" name="anterior" value="anterior">';
    $output .= '</form>';
    return $output;
}

?>






