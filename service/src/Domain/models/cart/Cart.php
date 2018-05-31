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
//
//    public function addGoods(Goods $goods,$num){
//        array_push($this->goodsLst,new CartItem($goods,$num));
//    }
//
//    public function removeGoods($goodsId){
//        $removeIndex = null;
//        foreach ($this->goodsLst as $i=> $goodsItem){
//            if($goodsItem.goodsId == $goodsId ){
//                $removeIndex = $i;
//            }
//        }
//        if($removeIndex != null)
//        array_splice($this->goodsLst,$removeIndex,1);
//    }
//
//    public function changeGoodsNum($goodsId,$num){
//        $changeIndex = null;
//        foreach ($this->goodsLst as $i=> $goodsItem){
//            if($goodsItem.goodsId == $goodsId ){
//                $goodsItem->num = $num;
//            }
//        }
//    }



}