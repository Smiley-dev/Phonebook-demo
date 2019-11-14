<?php

//Load config
require_once 'config/config.php';

//Autoload libraries
spl_autoload_register(function($class){
    require_once 'libs/' . $class . '.php';
});