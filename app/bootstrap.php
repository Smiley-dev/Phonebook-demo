<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);

//Load config
require_once 'config/config.php';
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';
require 'vendor/autoload.php';

//Autoload libraries
spl_autoload_register(function($class){
    require_once 'libs/' . $class . '.php';
});