<?php
namespace Service\Domain\models\order;

use Service\Domain\models\EntityInterface;

class Order implements EntityInterface {
    public $id;
    public $address;
    public $sendType;
    public $sendTime;
    public $payType;
    public $goodsList;
    public $fList;
    public $price;
    public $remark;
    public $orderCode;
    public $status;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->status     = !empty($data['status']) ? $data['status'] : null;
        $this->sendType     = !empty($data['sendType']) ? $data['sendType'] : null;
        $this->payType     = !empty($data['payType']) ? $data['payType'] : null;
        $this->sendTime     = !empty($data['sendTime']) ? $data['sendTime'] : null;
        $this->address     = !empty($data['address']) ? json_decode($data['address']) : null;
        $this->goodsList     = !empty($data['goodsList']) ? json_decode($data['goodsList']) : null;
        $this->fList     = !empty($data['fList']) ? json_decode($data['fList']) : null;
        $this->price     = !empty($data['price']) ? $data['price'] : null;
        $this->remark     = !empty($data['remark']) ? $data['remark'] : null;
        $this->orderCode     = !empty($data['orderCode']) ? $data['orderCode'] : null;
    }

    public function exchangeData()
    {
        $data = [
            'status' => $this->status,
            'sendType' => $this->sendType,
            'sendTime' => $this->sendTime,
            'address' => json_encode($this->address),
            'goodsList' => json_encode($this->goodsList),
            'fList' => json_encode($this->fList),
            'price' => $this->price,
            'remark' => $this->remark,
            'payType' => $this->payType,
            'orderCode' => $this->orderCode,
        ];
        return $data;
    }

}