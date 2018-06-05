<?php
namespace Service\Application\services;

use Service\Domain\models\order\Order;

class OrderService {
    private $orderRepository;
    private $goodsRepository;
    private $specificatRepository;
    private $addressRepository;
    public function __construct($orderRepository,$goodsRepository,$specificatRepository,$addressRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->goodsRepository = $goodsRepository;
        $this->specificatRepository = $specificatRepository;
        $this->addressRepository = $addressRepository;
    }


    public function preCreateOrder($orderDto){

        $order = new Order();
        $order->orderCode = 'JXXX1230123';
        $order->remark = '无';
        $order->sendTime = 0;
        $order->sendType =1 ;

        $order->fList = [];
        $order->goodsList = [];
        $order->address = [];

        /**
         *  'title' =>'农夫山泉550ml',
        'pic'=>'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png',
        'specif'=>['title'=>'瓶','units'=>1],
        'price'=>2.5,
        'num'=>2,
        'total'=>5
         */
        $price = 0;
        foreach ($orderDto['goodsList'] as $goodsInfo){
            $goods = $this->goodsRepository->findBySku($goodsInfo['sku']);
            $specif = $this->specificatRepository->findBySkuUnits($goodsInfo['sku'],$goodsInfo['units']);
            $order->goodsList[] = [
                'title' => $goods->title,
                'pic' => $goods->pic,
                'specif' => ['title'=>$specif->title,'units'=>$specif->units],
                'price' => $specif->price,
                'num' => $goodsInfo['num'],
                'total' => $specif->price * $goodsInfo['num']
            ];
            $price += $specif->price * $goodsInfo['num'];
        }
        $order->price = $price;

        //address
        $address = $this->addressRepository->findByUid(['uid'=>1]);
        $order->address = [
            'id' => $address->id,
            'name' => $address->name,
            'tel' => $address->tel,
            'address' => $address->addressDetail
        ];

        //fList 这里处理优惠
        $order->fList = [
            [
                'title' => '收取运费',
                'price' => 2
            ]
        ];

        return $order;
    }

}