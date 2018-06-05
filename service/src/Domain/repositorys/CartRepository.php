<?php
namespace Service\Domain\repositorys;




use Service\Domain\models\cart\Cart;

class CartRepository extends AbstractCURDRepository{


    public function getEntity()
    {
        return Cart::class;
    }

    public function getTable()
    {
        return 'cart';
    }

    public function findByUid($uid){
        return $this->tableGateway->select([
            'uid' => $uid
        ]);
    }

}