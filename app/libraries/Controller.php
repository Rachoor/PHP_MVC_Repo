<?php
/**
 * Created by PhpStorm.
 * User: phalgunakumarrachoor
 * Date: 2/6/19
 * Time: 4:24 PM
 */

// Base Controller and loads models and views

class Controller{
    public function __construct()
    {
    }

    public function model($model){

//        load model
    require_once '../app/models/'.$model.'.php';

//    instantiate model

        return new $model();

    }

    public function view($view, $data=[]) {

//    check for view file
        if(file_exists('../app/views/'.$view.'.php')) {
            require_once '../app/views/'.$view.'.php';
        }
        else{
            die('View does not exists');
        }
    }
}