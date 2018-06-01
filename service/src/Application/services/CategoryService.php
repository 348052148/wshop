<?php
namespace Service\Application\services;

use Service\Domain\models\category\Category;
use Service\Domain\repositorys\CategoryRepository;

class CategoryService  {

    private $repository;

    public function __construct($respository)
    {
       $this->repository = $respository;
    }

    /**
     * 添加类目
     * @param $categoryDto
     * @return Category
     */
    public function addCategory( $categoryDto){
        $category = new Category();

        $category->categoryName =$categoryDto['categoryName'];
        $category->pCategoryId = $categoryDto['pCategoryId'];
        $category->categoryCode = $categoryDto['categoryCode'];
        $category->isShow = $categoryDto['isShow'];

        $this->repository->save($category);

        return $category;
    }

    public function categoryLst(){

        $categoryLst = $this->repository->findAll();

        return $categoryLst;
    }

    /**
     * 以树形结构获取类目
     * @return array
     */
    public function categoryTree(){
        $categoryLst = $this->repository->findAll();
        $categoryTree = [];
        foreach ($categoryLst as $category){
            $categoryTree[$category->pCategoryId] = $category;
        }
        return $categoryTree;
    }
}