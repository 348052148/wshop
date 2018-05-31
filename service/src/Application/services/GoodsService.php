<?php
namespace Servcie\Application\services;


use Service\Domain\goods\Goods;
use Service\Domain\goods\Specificat;

class GoodsService  {

    private $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function addGoods($goodsDto){
        $goods = new Goods();
        $goods->title = $goodsDto->title;
        $specificat = ['name'=>$goodsDto->specificatName,'units'=>$goodsDto->specificatUnits];

        array_push($goods->specificat,$specificat);

        $goods->categoryId = $goodsDto->categoryId;

        $this->repository->save($goods);

        return $goods;
    }

    public function goodsLst(){
        $goodsLst = $this->goodsRepository->findAll();
        return $goodsLst;
    }

}