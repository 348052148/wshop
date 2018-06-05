<?php
namespace Service\Domain\repositorys;


use Service\Domain\models\goods\Goods;
use Zend\Db\Sql\Select;

class GoodsRepository extends AbstractCURDRepository {

    public function getEntity()
    {
        return Goods::class;
    }

    public function getTable()
    {
        return 'goods';
    }

    public function findBySku($sku)
    {
        $rowset = $this->tableGateway->select([
           'sku' => $sku
        ]);
        $row = $rowset->current();

        return $row;
    }

    public function findList($offset,$limit=10){
        $select = new Select($this->tableGateway->getTable());
        $select->offset($offset)->limit($limit);

        $rowset = $this->tableGateway->selectWith($select);

        return $rowset;
    }

}