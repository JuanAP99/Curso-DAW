<?php

    $ruta_dir = "subidas/";
    $ruta_file = $ruta_dir.basename($_FILES["bImagen"]["name"]);
    $subida_check = 1;
    $tipo_imagen = strtolower(pathinfo($ruta_file,PATHINFO_EXTENSION));

    if(isset([$_POST]["submit"])){

        $check = getimagesize($_FILES["bImagen"]["tmp_name"]);

        if($check !== false){

            echo "El archivo es una imagen -".$check["mime"].".";
            $subida_check = 1;
        }else{
            echo "El archivo no es una imagen";
            $subida_check = 0;
        }

    }

    
?>    