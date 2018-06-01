<?php

namespace  Shop\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ShopController extends AbstractActionController{

    private $shopService;

    public function __construct($service)
    {
        $this->shopService = $service;
    }

    public function baseAction(){

        $list = $this->shopService->shopList();

        return new ViewModel([
            'list'=>$list
        ]);
    }

    public function addAction(){

        if($this->request->isPost()){
            $data = $this->request->getPost();
            $this->shopService->addShop(
                [
                    'shopName' => $data['shopName'],
                    'shopAlias' => $data['shopAlias'],
                    'shopType' => $data['shopType'],
                    'shopAddress' => $data['shopAddress'],
                    'shopTel' => $data['shopTel'],
                    'shopLogic' => $data['shopLogic'],
                    'shopLeading' => $data['shopLeading'],
                    'shopPic' => $data['shopPic'],
                ]
            );
            return $this->redirect()->toRoute('shop',['action'=>'base']);
        }


        return new ViewModel([

        ]);

    }

}
