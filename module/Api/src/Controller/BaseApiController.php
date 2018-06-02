<?php
namespace Api\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class BaseApiController extends AbstractActionController{


    public function success($data){

        echo json_encode($data);exit;
    }

    public function error($msg){
        echo json_encode([
            'message' => $msg
        ]);exit;
    }
}