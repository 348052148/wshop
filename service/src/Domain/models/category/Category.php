<?php
namespace Service\Domain\models\category;

class Category {
    private $id;
    private $categoryName;
    private $pCategoryId;

    public function __construct($name)
    {
        $this->categoryName = $name;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}