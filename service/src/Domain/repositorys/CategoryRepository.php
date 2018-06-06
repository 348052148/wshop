<?php
namespace Service\Domain\repositorys;

use Service\Domain\models\category\Category;
use Zend\Db\Exception\RuntimeException;
use Zend\Db\Sql\Select;

class CategoryRepository extends AbstractCURDRepository {

    public function getTable()
    {
        return 'category';
    }

    public function getEntity()
    {
        return Category::class;
    }

    public function categoryList(){
        $select = new Select($this->tableGateway->getTable());

        $select->order('id DESC');

        $rowset = $this->tableGateway->selectWith($select);

        return $rowset;
    }
}