<?php
 $formulario = array(
    1 => array(
    'control_01' => array(
        'tipo' => 'radio',
        'name' => 'musculo_a_mejorar',
        'opciones' => array(
            0 => 'Gluteos',
            1 => 'Pectorales',
            2 => 'Biceps'
        ),
    ),
    'control_02' => array(
        'tipo' => 'submit',
        'name' => 'siguiente'
    ),
         
), 
    2 => array(
        'control_01' => array(
            'tipo' => 'number',
            'name' => 'kilos',
            'label' => 'Introduce kg levantados '
        ),
        'control_02' => array(
            'tipo' => 'number',
            'name' => 'repeticiones',
            'label' => 'Introduce repeticiones '
        ),
         'control_03' => array(
            'tipo' => 'submit',
            'name' => 'siguiente'
        ),
        'control_04' => array(
           'tipo' => 'submit',
           'name' => 'anterior'
       )
    ),

    3 => array(
        'control_01' => array(
            'name' => 'seleccion_Mejora',
            'value' => array(
                'mej_reps' => 'Mejorar repeticiones',
                'mej_fuerza' => 'Mejorar fuerza',
                'mej_ambas' => 'Mejorar todo',
            )
        ),
        'control_02' => array(
            'tipo' => 'submit',
            'name' => 'siguiente'
        ),
        'control_03' => array(
           'tipo' => 'submit',
           'name' => 'anterior'
       )
    ),
    4 => array(
        'control_01' => array(
            'tipo' => 'text',
            'name' => 'Nombre',
            'label' => 'Introduce tu nombre'
        ),
        'control_02' => array(
            'tipo' => 'text',
            'name' => 'Email',
            'label' => 'Introduce tu email'
        ),
        'control_03' => array(
            'tipo' => 'submit',
            'name' => 'siguiente'
        ),
        'control_04' => array(
           'tipo' => 'submit',
           'name' => 'anterior'
       )
    ),
    5 => array(
        'control_01' => array(
            'tipo' => 'submit',
            'name' => 'anterior'
        )
        
    )

);
$niveles = array(
    'principiante' => 'Principiante : Enfocate en la técnica de entrenamiento | Tiempo límite: 3 meses',
    'intermedio' => 'Intermedio: Enfocate en ganar fuerza, pocas repeticiones | Tiempo límite: 2 meses',
    'pro' => 'Pro: Enfocate en doblar tus repeticiones con peso máximo | Tiempo límite: 1 mes'
    )
?>