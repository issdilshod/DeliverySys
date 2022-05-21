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
                    $vars['data'] = ['error' => 'Something went wrong, try again.', 'price' => '', 'date' => ''];
                }
            }else{
                $vars['data'] = ['error' => 'Some fields are empty.', 'price' => '', 'date' => ''];
            }
        }

        // Answer
        echo json_encode($vars['data']);
    }

    public function fastAction(){
        // Init
        $this->setModels();
        $vars['entity'] = $this->entityDelivery->getEntity();
        $vars['data'] = [];
        $vars['webappConfig'] = $this->configWebApp;

        // on Post sended
        if (isset($_POST['fast'])){
            $tmp = $this->ifunc->checkPostValues($vars['entity']);
            if(count($tmp) == count($vars['entity'])){
                $tmp_answer = $this->ifunc->sendReq($tmp);
                if(count($tmp_answer)>0){
                    $vars['data'] = ['price' => $tmp_answer['price'], 'date' => date('Y-m-d', strtotime(date('Y-m-d') . ' +'.$tmp_answer['date'].' day')), 'error' => ''];
                }else{
                    $vars['data'] = ['error' => 'Something went wrong, try again.', 'price' => '', 'date' => ''];
                }
            }else{
                $vars['data'] = ['error' => 'Some fields are empty.', 'price' => '', 'date' => ''];
            }
        }

        // Answer
        echo json_encode($vars['data']);
    }
}