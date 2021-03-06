<?php

namespace  Sale\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SaleBillController extends AbstractActionController{


    public function baseAction(){
        return new ViewModel();
    }

    public function addAction(){
        $method = $this->request->getMethod();
        if($method == 'GET'){
            return new ViewModel();
        }

        if($method == 'POST'){
//           var_dump($this->request->getPost());
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
