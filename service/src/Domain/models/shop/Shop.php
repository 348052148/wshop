<?php
namespace Service\Domain\models\shop;

use Service\Domain\models\EntityInterface;

class Shop implements EntityInterface {

    public $id;
    public $shopName;
    public $shopAlias;
    public $shopType;
    public $shopAddress;
    public $shopLeading;
    public $shopTel;
    public $shopLogic;
    public $shopPic;
    public function exchangeArray(array $data)
    {
        $this->id = !empty($data['id']) ? $data['id'] : null;
        $this->shopName = !empty($data['shopName']) ? $data['shopName'] : null;
        $this->shopAlias = !empty($data['shopAlias']) ? $data['shopAlias'] : null;
        $this->shopType = !empty($data['shopType']) ? $data['shopType'] : null;
        $this->shopAddress = !empty($data['shopAddress']) ? $data['shopAddress'] : null;
        $this->shopLeading = !empty($data['shopLeading']) ? $data['shopLeading'] : null;
        $this->shopTel = !empty($data['shopTel']) ? $data['shopTel'] : null;
        $this->shopLogic = !empty($data['shopLogic']) ? $data['shopLogic'] : null;
        $this->shopPic = !empty($data['shopPic']) ? $data['shopPic'] : null;
    }

    public function exchangeData()
    {
        $data = [
            'shopName' => $this->shopName,
            'shopAlias' => $this->shopAlias,
            'shopType' => $this->shopType,
            'shopAddress' => $this->shopAddress,
            'shopLeading' => $this->shopLeading,
            'shopTel' => $this->shopTel,
            'shopLogic' => $this->shopLogic,
            'shopPic' => $this->shopPic
        ];

        return $data;
    }
}