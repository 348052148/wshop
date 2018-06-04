<?php
namespace Service\Domain\models\category;

use Service\Domain\models\EntityInterface;

class Category implements EntityInterface {
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
        $this->id = !empty($data['id']) ? $data['id'] : 0;
        $this->categoryName = !empty($data['categoryName']) ? $data['categoryName'] : null;
        $this->pCategoryId = !empty($data['pCategoryId']) ? $data['pCategoryId'] : 0;
        $this->categoryCode = !empty($data['categoryCode']) ? $data['categoryCode'] : null;
        $this->categoryAttr = !empty($data['categoryAttr']) ? $data['categoryAttr'] : null;
        $this->categoryPic = !empty($data['categoryPic']) ? $data['categoryPic'] : null;
        $this->isShow = !empty($data['isShow']) ? $data['isShow'] : null;

    }

    public function exchangeData()
    {
        $data = [
            'categoryName' => $this->categoryName,
            'pCategoryId' => $this->pCategoryId,
            'categoryCode' => $this->categoryCode,
            'categoryAttr' => $this->categoryAttr,
            'categoryPic' => $this->categoryPic,
            'isShow' => $this->isShow
        ];
        return $data;
    }
}