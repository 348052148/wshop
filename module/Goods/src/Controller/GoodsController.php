<?php

namespace  Goods\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class GoodsController extends AbstractActionController{

    protected $service;

    public function __construct($service)
    {
        $this->service = $service;
    }

    public function baseAction(){
        $goodsList = $this->service->goodsLst();
        return new ViewModel(['list'=>$goodsList]);
    }

    public function addAction(){
        $method = $this->request->getMethod();
        if($method == 'GET'){
            return new ViewModel();
        }

        if($this->request->isPost()){
            $data = $this->request->getPost();
            $this->service->addGoods(
                [
                    'title' => $data['title'],
                    'subTitle' => $data['subTitle'],
                    'categoryId' => $data['categoryId'],
                    'originalPrice' => $data['originalPrice'],
                    'mode' => $data['mode'],
                    'type' => $data['type'],
                    'tags' => $data['tags'],
                    'desc' => $data['desc'],
                    'pic' => $data['pic'],
                ]
            );
        }

        $this->redirect()->toRoute('goods',['action'=>'base']);
    }

    public function editAction(){
//        echo 'edit';die;

        $id = (int) $this->params()->fromRoute('id', 0);

        if (0 === $id) {
            return $this->redirect()->toRoute('goods', ['action' => 'add']);
        }


        if($this->request->isPost()){
            //var_dump($this->request->getPost());
            return $this->redirect()->toRoute('goods',['action'=>'base']);
        }

        return new ViewModel([]);
    }

    public function deleteAction(){
        echo 'del';die;
    }
}
