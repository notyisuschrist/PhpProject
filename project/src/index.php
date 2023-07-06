<?php

const BASE_PATH = __DIR__.'/'; // falta añadir (.'/../') , funciona por ahora

require 'Core/Functions.php';
require 'routes.php';

views('index.views.php',[
    'heading' => 'Home'
]);