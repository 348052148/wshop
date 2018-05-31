<?php
namespace Service\Domain\repositorys;


use Service\Domain\models\goods\Goods;
use Zend\Db\Exception\RuntimeException;

class GoodsRepository implements RepositorysInterface {

    private $tableGateway;

    public function getEntity()
    {
        return Goods::class;
    }

    public function getTable()
    {
        return 'goods';
    }

    public function setTableGateway($tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function getTableGateway()
    {
        return $this->tableGateway;
    }

    public function save(Goods $goods)
    {

        $specif = '';
        $specifTitle = '';

        foreach ($goods->specificat as $specifcat){
            $specif .= $specifcat->units.":";
            $specifTitle .= $specifcat->name;
        }

        $data = [
            'sku' => $goods->sku,
            'title'  => $goods->title,
            'subTitle'  => $goods->subTitle,
            'pic'  => $goods->pic,
            'originalPrice'  => $goods->originalPrice*100,
            'categoryId'  => $goods->categoryId,
            'type'  => $goods->type,
            'mode' =>$goods->mode,
            'tags' => implode(';',$goods->tags),
            'specif' => $specif,
            'specifTitle' => $specifTitle,
        ];

        $id = (int) $goods->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->findOne($id)) {
            throw new RuntimeException(sprintf(
                'Cannot update album with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function findAll(){

        return $this->tableGateway->select();
    }

    public function findOne($id){

        $id = (int) $id;

        $rowset = $this->tableGateway->select(['id'=>$id]);

        $row = $rowset->current();

        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                1
            ));
        }

        return $row;
    }

//    public function findById($id){
//        $orderEntity =  $this->where(['_id'=>$id])->first([]);
//
//        $order = new Order();
//        $order->id = $orderEntity->id;
//        $order->ctime = $orderEntity->ctime;
//        $order->status = $orderEntity->status;
//        $order->orderPrice = $orderEntity->orderPrice;
//        $order->goodsLst = $orderEntity->goodsLst;
//        $order->payType = $orderEntity->payType;
//        $order->user = $orderEntity->user;
//
//        return $order;
//    }
//
//
//    public function findAll(){
//        $userEntitys = $this->get([]);
//        $orderLst = [];
//        foreach ($userEntitys as $orderEntity){
//            $order = new Order();
//            $order->id = $orderEntity->id;
//            $order->ctime = $orderEntity->ctime;
//            $order->status = $orderEntity->status;
//            $order->orderPrice = $orderEntity->orderPrice;
//            $order->goodsLst = $orderEntity->goodsLst;
//            $order->payType = $orderEntity->payType;
//            $order->user = $orderEntity->user;
//            array_push($orderLst,$order);
//        }
//        return $orderLst;
//    }
//
//    public function store(Order $order){
//        $this->update(['_id'=>$order->id],[
//            'ctime' => $order->username,
//            'status' => $order->passwd,
//            'orderPrice' => $order->nickname,
//            'goodsLst' => $order->goodsLst,
//            'payType' => $order->payType,
//            'user' => $order->user
//        ]);
//    }
}