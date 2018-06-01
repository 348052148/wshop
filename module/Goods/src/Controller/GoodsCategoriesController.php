<?php
namespace Goods\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class GoodsCategoriesController extends AbstractActionController{
    private $categoryService;
    public function __construct($service)
    {
        $this->categoryService = $service;
    }

    public function baseAction(){
        $list = $this->categoryService->categoryLst();
        return new ViewModel([
            'list' => $list
        ]);
    }

    public function addAction(){

        if($this->request->isPost()){
            $data = $this->request->getPost();
            $this->categoryService->addCategory(
                [
                    'categoryName' => $data['categoryName'],
                    'categoryCode' => $data['categoryCode'],
                    'categoryAttr' => $data['categoryAttr'],
                    'categoryPic' => $data['categoryPic'],
                    'isShow' => 1,
                ]
            );
            return $this->redirect()->toRoute('category',['action'=>'base']);
        }

        $categoryTree = $this->categoryService->categoryTree();

        return new ViewModel([
            'categoryTree' => $categoryTree
        ]);

    }

    public function editAction(){

    }

    public function deleteAction(){
        
    }
}