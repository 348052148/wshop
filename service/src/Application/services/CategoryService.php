<?php
namespace Servcie\Application\services;

use Servcie\Domain\models\category\Category;
use Servcie\Domain\repositorys\CategoryRepository;
use UI\dtos\RequestDto;

class CategoryService  {

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }

    public function addCategory(RequestDto $categoryDto){
        $category = new Category($categoryDto->name);

        $category->pCategoryId = $categoryDto->pcategoryId;

        $this->categoryRepository->store($category);

        return $category;
    }

    public function categoryLst(RequestDto $dto){
        $categoryLst = $this->categoryRepository->findAll();

        return $categoryLst;
    }
}