<?php
namespace Service\Domain\models\user;

use Service\Domain\models\EntityInterface;

class Address implements EntityInterface{

    public $id;
    public $name;
    public $uid;
    public $tel;
    public $province;
    public $city;
    public $county;
    public $addressDetail;
    public $areaCode;
    public $postalCode;
    public $isDefault;

    public function exchangeData()
    {
        /**
         * 'id'=>1,
        'name' => '~~~~',
        'tel' => '18523922709',
        'province' => '重庆',
        'city' => '重庆',
        'county' => '豫北',
        'address_detail' => '浙江省杭州市西湖区文三路 138 号东方通信大厦 7 楼 501 室',
        'area_code' => '10010001001',
        'postal_code' => '640001',
        'is_default'=> true
         */
        // TODO: Implement exchangeData() method.
        $data = [
            'name' => $this->name,
            'uid' => $this->uid,
            'tel' => $this->tel,
            'province' => $this->province,
            'city' => $this->city,
            'county' => $this->county,
            'addressDetail' => $this->addressDetail,
            'areaCode' => $this->areaCode,
            'postalCode' => $this->postalCode,
            'isDefault' => $this->isDefault
        ];
        return $data;
    }

    public function exchangeArray(array $data)
    {
        // TODO: Implement exchangeArray() method.
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->uid     = !empty($data['uid']) ? $data['uid'] : null;
        $this->name     = !empty($data['name']) ? $data['name'] : null;
        $this->tel     = !empty($data['tel']) ? $data['tel'] : null;
        $this->province     = !empty($data['province']) ? $data['province'] : null;
        $this->city     = !empty($data['city']) ? $data['city'] : null;
        $this->county     = !empty($data['county']) ? $data['county'] : null;
        $this->addressDetail     = !empty($data['addressDetail']) ? $data['addressDetail'] : null;
        $this->areaCode     = !empty($data['areaCode']) ? $data['areaCode'] : null;
        $this->postalCode     = !empty($data['postalCode']) ? $data['postalCode'] : null;
        $this->isDefault     = !empty($data['isDefault']) ? $data['isDefault'] : null;
    }
}