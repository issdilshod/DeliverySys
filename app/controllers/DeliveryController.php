<?php
namespace app\controllers;

use app\core\Controller;
use app\entity\DeliveryEntity;
use app\models\Delivery;

class DeliveryController extends Controller{

    private $modelDelivery;
    private $entityDelivery;

    private $configWebApp;

    private function setModels(){
        $this->modelDelivery = new Delivery();
        $this->entityDelivery = new DeliveryEntity();

        $this->configWebApp = require 'app/config/conf.php';
    }

    public function indexAction(){
        // Init
        $this->setModels();
        $vars['entity'] = $this->entityDelivery->getEntity();
        $vars['page'] = $this->route['controller'];
        $vars['config'] = $this->configWebApp;

        // Answer
        
    }

    public function addAction(){
        //
    }

    public function updateAction(){
        //
    }
}