<?php
/**
 * Created by PhpStorm.
 * User: phalgunakumarrachoor
 * Date: 2/6/19
 * Time: 5:41 PM
 */

class Pages extends Controller {
    public function __construct()
    {
    }
    public function index() {
        $data= ['title'=>'Welcome'];
        $this->view('pages/index', $data);

    }

    public function about() {
        $this->view('pages/about');
    }
}