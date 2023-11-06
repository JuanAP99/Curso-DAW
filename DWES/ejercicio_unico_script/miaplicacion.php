<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(!isset($_POST)){?>
        <form action="miaplicacion.php"   method="post">
            <label for="txtNombre"></label><br>
           <input type="text" name="txtNombre" id="txtNombre"> <br>
            <label for="txtEmail"></label> <br>
            <input type="text" name="txtEmail" id="txtEmail">
         </form>   
        
         
     

     

       

     <form action="miaplicacion.php"   method="post">
        <label for="txtNombrePareja"></label><br>
        <input type="text" name="txtNombrePareja" id="txtNombrePareja"> <br>
        <label for="txtEmailPareja"></label> <br>
        <input type="text" name="txtEmailPareja" id="txtEmailPareja">
        <input type="hidden" name="hiddenBoxUno" value="<?php base64_encode(serialize("txtNombre"))?>">
        <input type="hidden" name="hiddenBoxDos" value="<?php base64_encode(serialize("txtEmail"))?>">
     </form>

</body>
</html>