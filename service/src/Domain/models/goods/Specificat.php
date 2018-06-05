<?php
namespace Service\Domain\models\goods;

use Service\Domain\models\EntityInterface;

class Specificat implements EntityInterface {

    public $id;
    public $sku;
    public $title;
    public $units;
    public $pic;
    public $price;
    public $originalPrice;
    public $isDefault=0;

    public function exchangeData()
    {
       $data = [
            'sku' => $this->sku,
            'title' => $this->title,
            'units' => $this->units,
            'pic' => $this->pic,
            'price' => $this->price,
            'originalPrice' => $this->originalPrice,
            'isDefault' => $this->isDefault,
       ];

       return $data;
    }

    public function exchangeArray(array $data)
    {

        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->sku = !empty($data['sku']) ? $data['sku'] : null;
        $this->title = !empty($data['title']) ? $data['title'] : null;
        $this->units = !empty($data['units']) ? $data['units'] : null;
        $this->pic = !empty($data['pic']) ? $data['pic'] : null;
        $this->price = !empty($data['price']) ? $data['price'] : null;
        $this->originalPrice = !empty($data['originalPrice']) ? $data['originalPrice'] : null;
        $this->isDefault = !empty($data['isDefault']) ? $data['isDefault'] : null;

    }
}