<?php
namespace Service\Domain\models\category;

class Category {
    public $id;
    public $categoryName;
    public $pCategoryId;
    public $categoryCode;
    public $categoryAttr;
    public $isShow;
    public $categoryPic;

    public function __construct()
    {
        $this->categoryPic = '暂无';
    }

    public function exchangeArray(array $data)
    {
        $this->id = !empty($data['id']) ? $data['id'] : null;
        $this->categoryName = !empty($data['categoryName']) ? $data['categoryName'] : null;
        $this->pCategoryId = !empty($data['pCategoryId']) ? $data['pCategoryId'] : null;
        $this->categoryCode = !empty($data['categoryCode']) ? $data['categoryCode'] : null;
        $this->categoryAttr = !empty($data['categoryAttr']) ? $data['categoryAttr'] : null;
        $this->categoryPic = !empty($data['categoryPic']) ? $data['categoryPic'] : null;
        $this->isShow = !empty($data['isShow']) ? $data['isShow'] : null;

    }
}