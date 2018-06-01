<?php
namespace Service\Domain\repositorys;

use Service\Domain\models\category\Category;
use Zend\Db\Exception\RuntimeException;

class CategoryRepository extends AbstractCURDRepository {

    public function getTable()
    {
        return 'category';
    }

    public function getEntity()
    {
        return Category::class;
    }

}