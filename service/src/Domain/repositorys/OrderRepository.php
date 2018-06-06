<?php
namespace Service\Domain\repositorys;


use Service\Domain\models\order\Order;
use Zend\Db\Sql\Select;

class OrderRepository extends AbstractCURDRepository {

    public function getEntity()
    {
        return Order::class;
    }

    public function getTable()
    {
        return 'order';
    }

    public function findList($status,$offset,$limit=10){
        $select = new Select($this->tableGateway->getTable());
        if(!empty($status) ){
            $select->where->equalTo('status',intval($status));
        }
        $select->offset($offset)->limit($limit);

        $rowset = $this->tableGateway->selectWith($select);

        return $rowset;
    }

}