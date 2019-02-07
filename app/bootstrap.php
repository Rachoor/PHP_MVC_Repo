<?php
/**
 * Created by PhpStorm.
 * User: phalgunakumarrachoor
 * Date: 2/6/19
 * Time: 4:26 PM
 */

//Load config file
require_once 'config/config.php';
require_once 'libraries/Core.php';
require_once  'libraries/Controller.php';
require_once  'libraries/Database.php';

//Autoload core libraries

spl_autoload_register(function ($className){});
