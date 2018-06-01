<?php
namespace Service\Domain\repositorys;

use Service\Domain\order\Order;
use Service\Domain\repositorys\RepositorysInterface;

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