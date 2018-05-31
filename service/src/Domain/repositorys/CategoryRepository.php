<?php
namespace Service\Domain\repositorys;

use Service\Domain\models\category\Category;
use Service\Domain\order\Order;

class CategoryRepository implements RepositorysInterface {

    private $tableGateway;

    public function getTable()
    {
        return 'category';
    }

    public function getEntity()
    {
        return Category::class;
    }

    public function setTableGateway($tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function getTableGateway()
    {
        return $this->tableGateway;
    }

    public function findById($id){
        $orderEntity =  $this->where(['_id'=>$id])->first([]);

        $order = new Order();
        $order->id = $orderEntity->id;
        $order->ctime = $orderEntity->ctime;
        $order->status = $orderEntity->status;
        $order->orderPrice = $orderEntity->orderPrice;
        $order->goodsLst = $orderEntity->goodsLst;
        $order->payType = $orderEntity->payType;
        $order->user = $orderEntity->user;

        return $order;
    }


    public function findAll(){
        $userEntitys = $this->get([]);
        $orderLst = [];
        foreach ($userEntitys as $orderEntity){
            $order = new Order();
            $order->id = $orderEntity->id;
            $order->ctime = $orderEntity->ctime;
            $order->status = $orderEntity->status;
            $order->orderPrice = $orderEntity->orderPrice;
            $order->goodsLst = $orderEntity->goodsLst;
            $order->payType = $orderEntity->payType;
            $order->user = $orderEntity->user;
            array_push($orderLst,$order);
        }
        return $orderLst;
    }

    public function store(Order $order){
        $this->update(['_id'=>$order->id],[
            'ctime' => $order->username,
            'status' => $order->passwd,
            'orderPrice' => $order->nickname,
            'goodsLst' => $order->goodsLst,
            'payType' => $order->payType,
            'user' => $order->user
        ]);
    }
}