<?php
namespace Service\Domain\repositorys;


use Service\Domain\models\order\Order;

class OrderRepository extends AbstractCURDRepository {

    public function getEntity()
    {
        return Order::class;
    }

    public function getTable()
    {
        return 'order';
    }

}