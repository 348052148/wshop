<?php
namespace Service\Domain\models\cart;


use Service\Domain\models\EntityInterface;

class Cart implements EntityInterface {
    public $id;
    public $uid;
    public $title;
    public $pic;
    public $sku;
    public $units;
    public $num;
    public $price;
    public $specifText;


    public function __construct()
    {

    }

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->uid = !empty($data['uid']) ? $data['uid'] : null;
        $this->title = !empty($data['title']) ? $data['title'] : null;
        $this->pic = !empty($data['pic']) ? $data['pic'] : null;
        $this->sku = !empty($data['sku']) ? $data['sku'] : null;
        $this->units = !empty($data['units']) ? $data['units'] : null;
        $this->num = !empty($data['num']) ? $data['num'] : null;
        $this->price = !empty($data['price']) ? $data['price'] : null;
        $this->specifText = !empty($data['specifText']) ? $data['specifText'] : null;

    }

    public function exchangeData()
    {
        $data = [
            'uid' => $this->uid,
            'title' => $this->title,
            'pic' => $this->pic,
            'sku' => $this->sku,
            'units' => $this->units,
            'num' => $this->num,
            'price' => $this->price,
            'specifText' => $this->specifText,
        ];

        return $data;
    }

}