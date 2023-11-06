<?php 
/* PASO 1: 

    Aspectos a mejorar.
    Sentadillas.
    Pectorales.
    Biceps.
    Tiene un boton siguiente

    PASO 2: Tu situación actual

    Dependiendo de lo que has escogido tiene que mostrar los kg y las rep. Tiene tb un boton de 
    siguiente y anterior.

    PASO 3: Tu mejora.

    Segun lo que metas en situacion actual, te sale 'como un plan' de mejora. posee boton de anterior
    y siguiente. 

    Paso 4 : Tus datos.

    Introducir datos como nombre email edad.
    Posee tb boton de anterior y siguiente.

    entre paso4 y paso5 preguntar si estas seguro de continuar.

    Paso 5:  Imprimir datos.

    Imprime los datos introducidos, los aspectos a mejorar, situación actual, y tu mejora.
*/
?>

<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('vars.php');
require_once('funciones.php');  

session_start();
$get_markup;
$datos;
   
if (!isset($_SESSION['formulario'])) {
    $_SESSION['formulario'] = array();
}

if (!empty($_POST) && isset($_POST['paso'])  ) {
    $_SESSION['formulario'] = array_merge($_SESSION['formulario'], $_POST);
    $_SESSION['pasoActual'] = $_POST['paso']; 
}else {
    $_SESSION['pasoActual'] = 1;
}

$datos = $_SESSION['formulario'];


if(isset($_POST['siguiente'])){
    $_POST['paso']++;
    $_SESSION['pasoActual']++;
}else if(isset($_POST['anterior'])){
    $_SESSION['pasoActual']--;
}

if(isset($_SESSION['pasoActual']) && $_SESSION['pasoActual'] == 5){
    $datos = $_SESSION['formulario'];
    $get_markup = imprimeDatos($datos);
}else{
    $get_markup = get_markup($formulario, $_SESSION['pasoActual'],$niveles,$_SESSION['formulario']);
    }

require_once ('template.php');

?>