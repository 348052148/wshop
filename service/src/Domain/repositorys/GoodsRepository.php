<?php
namespace Service\Domain\repositorys;


use Service\Domain\models\goods\Goods;

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

}