<?php
return[
   'title' => env('APP_NAME'),
   'little_title' => env('APP_NAME')[0],

    'version' => [
        'title' => 'Version',
        'code' => env('APP_VERSION'),
    ],

    'navigation' => [
        'title' => 'NAVIGATION',
        'toogle' => 'Affichage du menu',
    ],

    'copyright' => '<strong>Copyright &copy; <a href="'.env('APP_URL').'">'.env('APP_NAME').'</a>. Tous droits réservés.</strong>',
];