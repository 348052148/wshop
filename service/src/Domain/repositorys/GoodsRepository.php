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

    public function searchGoods($keyword=null,$class_id=null,$offset=0,$limit=10){
        $select = new Select($this->tableGateway->getTable());

        if($class_id!=null){
            $select->where->equalTo('categoryId',$class_id);
        }
//
        if($keyword != null){
            //这种操作使索引失效
            $select->where->like('title',"%".$keyword."%");
        }


        $select->offset(intval($offset))->limit(intval($limit));

        $rowset = $this->tableGateway->selectWith($select);

        return $rowset;
    }

}