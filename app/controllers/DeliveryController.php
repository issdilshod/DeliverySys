<?php
namespace app\controllers;

use app\core\Controller;
use app\entity\DeliveryEntity;
//use app\models\Delivery;

class DeliveryController extends Controller{

    //private $modelDelivery;
    private $entityDelivery;

    private $configWebApp;

    private function setModels(){
        //$this->modelDelivery = new Delivery();
        $this->entityDelivery = new DeliveryEntity();

        $this->configWebApp = require 'app/config/conf.php';
    }

    public function slowAction(){
        // Init
        $this->setModels();
        $vars['entity'] = $this->entityDelivery->getEntity();
        $vars['data'] = [];
        $vars['webappConfig'] = $this->configWebApp;

        // on Post sended
        if (isset($_POST['slow'])){
            $tmp = $this->ifunc->checkPostValues($vars['entity']);
            if(count($tmp) == count($vars['entity'])){
                $tmp_answer = $this->ifunc->sendReq($tmp);
                if(count($tmp_answer)>0){
                    $vars['data'] = ['price' => $tmp_answer['coefficient']*150, 'date' => $tmp_answer['date'], 'error' => ''];
                }else{
                    $vars['data'] = ['error' => 'Something went wrong, try again.', 'price' => '0.00', 'date' => ''];
                }
            }else{
                $vars['data'] = ['error' => 'Some fields are empty.', 'price' => '0.00', 'date' => ''];
            }
        }

        // Answer
        echo json_encode($vars['data']);
    }

    public function fastAction(){
        //
    }
}