<?php
namespace app\core;

use app\lib\IFunc;

abstract class Controller{
    
    public $route;
    public $ifunc;

    public function __construct($route){
        $this->route = $route;
        $this->ifunc = new IFunc();
    }

}