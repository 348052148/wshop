<?php
namespace Service\Domain\models\cart;

use Service\Domain\goods\Goods;

class Cart {
    public $id;
    public $uid;
    public $goodsLst = [];


    public function __construct()
    {

    }

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->uid = !empty($data['uid']) ? $data['uid'] : null;
    }

}