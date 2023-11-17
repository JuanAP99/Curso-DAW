<?php
/**
 * Función que genera el marcado del formulario HTML de los eventos a partir del parámetro events.
 * 
 * @param array $events: Un array asociativo con la lista de eventos. Consulta su estructura en el archivo vars.php
 * 
 * @return string La cadena html a insertar en la plantilla.
 */

session_start();

function get_events_form_markup($events){
    //TO DO: Debes cambiar el siguiente marcado para que se genere a partir de $events. Ten presente que debes incluirlo en un formulario para que puedan gestionarse las inclusiones en la lista de booked_courses. Utiliza para ello el control de formulario que consideres oportuno.

    //TO DO: Si te sobra tiempo, como ampliación, incluye en el HTML sólo los eventos que NO hayan sido ya reservados.
    $output ='<div class="col-lg-12 col-md-6">
    <div class="item">
      <div class="row">
        <div class="col-lg-3">
          <div class="image">
            <img src="assets/images/event-01.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-9">
          <ul>
            <li>
              <span class="category">Web Design</span>
              <h4>UI Best Practices</h4>
            </li>
            <li>
              <span>Date:</span>
              <h6>16 Feb 2036</h6>
            </li>
            <li>
              <span>Duration:</span>
              <h6>22 Hours</h6>
            </li>
            <li>
              <span>Price:</span>
              <h6>$120</h6>
            </li>
          </ul>
          <a href="#"><i class="fa fa-angle-right"></i></a>
        </div>
      </div>
    </div>
  </div>';
    return $output;
}
function get_events_form_markup_dinamico($events){

    $output = '';
    $output.= '<form action="" method="post">';
    foreach($events as $campo => $valor){

     
      /* date_timezone_set($valor['date_timestamp'], 'Y-m-d');*/ // esto es para el timestamp

      $output .='<div class="col-lg-12 col-md-6">
      <div class="item">
        <div class="row">
          <div class="col-lg-3">
            <div class="image">
              <img src="'.$valor['img_url'].'" alt="">
            </div>
          </div>
          <div class="col-lg-9">
            <ul>
              <li>
                <span class="category">'.$valor['category'].'</span>
                <h4>'.$valor['name'].'</h4>
              </li>
              <li>
                <span>Date:</span>
                <h6>'.$valor['date_timestamp'].'</h6>
              </li>
              <li>
                <span>Duration:</span>
                <h6>'.$valor['duration'].'</h6>
              </li>
              <li>
                <span>Price:</span>
                <h6>'.$valor['price'].'</h6>
              </li>
            </ul>
            <button type="submit" name="evento_'.$campo.'" >Enviar</button>
          </div>
        </div>
      </div>
    </div>';
    }
   
    $output.= '</form>';


    return $output;


}
/**
 * Función que genera el formulario HTML con la lista de eventos reservados. Junto a cada evento hay un botón de borrado. Los eventos reservados son una variable de sesión (superglobal), por lo que no es necesario pasarlo como parámetro. 
 * 
 * @return string La cadena html a insertar en la plantilla.
 */
function get_modal_booked_events_form(){
    //TO DO: Debes cambiar el siguiente marcado para que se genere dinámicamente a partir de la variable de sesión. Ten presente que debes incluirlo en un formulario para que puedan gestionarse las eliminaciones en la lista de booked_courses. Utiliza para ello el control de formulario que consideres oportuno. Si la lista está vacía debe mostrarse el mensaje "Your booked courses list is empty".

    $output = '';

    $output .= '<form action=index.php method="post">';
   if(isset($_SESSION['eventos_reservados']) && !empty($_SESSION['eventos_reservados'])){

    foreach($_SESSION['eventos_reservados'] as $campo => $valor){
      $output .= '<ul class="list-group">
      <li class="list-group-item">'.$valor['name'].'<button type="submit" name="borrar_'.$campo.'" class="btn btn-secondary float-end">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
  </svg>
    </button></li>
  </ul>';
    }
   }else{
    $output .= '<p>Your booked courses list is empty</p>';
   }

    $output .= '</form>';
    return $output;
}
/**
 * Esta función genera el texto del mensaje que irá en el toast que aparece en cada pantalla para comunicar 
 * 
 */
function get_user_message(){
  //TO DO: Gestiona los mensajes adecuadamente, a partir de la variable de sesión correspondiente, y devuelve el texto que se mostrará al usuario
  return '';
  //return 'Hola, esto es un mensaje';

}

//TO DO: Crea aquí las funciones adicionales que consideres oportunas.