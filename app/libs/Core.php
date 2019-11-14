<?php

/*
 * Main App class
 * creates url
 * loads Core controller
 * URL format - /controller/method/params
 */

class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'Index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();

        if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
            //If file exists set it as current Controller
            $this->currentController = ucwords($url[0]);

            //Unset 0 index
            unset($url[0]);
        }

        //Require the controller and instantiate class
        require_once '../app/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;


        if(isset($url[1])){
            //If method exists set it as current method
            if (method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = $_GET['url'];
            $url = rtrim($url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }

    }
}