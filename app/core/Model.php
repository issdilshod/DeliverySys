<?php

namespace app\core;

//use app\lib\DbMysqli;
use app\lib\IFunc;

abstract class Model{

    //public $db;
    public $ifunc;

    public function __loadParentModel(){
        //$this->db = new DbMysqli();
        $this->ifunc = new IFunc();
    }
}