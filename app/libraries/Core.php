<?php
/**
 * Created by PhpStorm.
 * User: phalgunakumarrachoor
 * Date: 2/6/19
 * Time: 4:23 PM
 */

class Core{
    protected $currentController ='Pages';
    protected $currentMethod = 'index';
    protected $params= [];

    public function __construct() {
//        print_r($this->getUrl());
        $url = $this->getUrl();

//        Look in controller for first value
        if(file_exists('../app/controllers/'.ucwords($url[0].'.php'))){
//            if exists then set as controllers
            $this->currentController = ucwords($url[0]);

//            unset the zero index by passing the url[0]

            unset($url[0]);
        }

        require_once '../app/controllers/'.$this->currentController.'.php';

        $this->currentController = new $this->currentController;

//        check for second part of url for method calling
        if(isset($url[1])) {
//            check to see for method existing in controller
            if(method_exists($this->currentController,$url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }
        $this->params = $url ? array_values($url):[];

//        call a callback if array of params

        call_user_func_array([$this->currentController,$this->currentMethod], $this->params);

    }

    public function getUrl() {
       if( isset($_GET['url'])){
           $url = rtrim($_GET['url'],'/');
           $url = filter_var($url, FILTER_SANITIZE_URL);
           $url = explode('/',$url);
           return $url;
       }
    }


}