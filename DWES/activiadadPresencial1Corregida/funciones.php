<?php 
    function get_formulario_markup(){

        $output = '';
        $output .=  '<form action="'.$_SERVER['PHP_SELF'].'" method="post">'; 
        
        for($i=65; $i<91;$i++){
            
            $output.= '<input type="checkbox" id="letra'.char($i).'" name="inicial[]" value="'.chr($i).">';
            $output .= '<label for="letra'.char(.'" ></label>';
        }

        $output .= '</form>';

    }


?>
