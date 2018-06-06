<?php
namespace Api\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class BaseApiController extends AbstractActionController{


    public function success($data){
        header('Access-Control-Allow-Origin: *');
        $data['code'] = 200;
        echo json_encode($data);exit;
    }

    public function error($msg){
        header('Access-Control-Allow-Origin: *');
        echo json_encode([
            'code' => 300,
            'message' => $msg
        ]);exit;
    }
}