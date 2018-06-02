<?php
namespace Api\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class BaseApiController extends AbstractActionController{


    public function success($data){
        header('Access-Control-Allow-Origin: *');
        echo json_encode($data);exit;
    }

    public function error($msg){
        header('Access-Control-Allow-Origin: *');
        echo json_encode([
            'message' => $msg
        ]);exit;
    }
}