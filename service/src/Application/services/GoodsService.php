<?php
namespace Servcie\Application\services;

use Servcie\Domain\goods\Goods;
use Servcie\Domain\goods\Specificat;
use Servcie\Domain\repositorys\GoodsRepository;
use UI\dtos\RequestDto;

class GoodsService  {

    public function __construct()
    {
        $this->goodsRepository = new GoodsRepository();
    }

    public function addGoods(RequestDto $goodsDto){
        $goods = new Goods();
        $goods->title = $goodsDto->title;
        $specificat = new Specificat($goodsDto->specificatName,$goodsDto->specificatUnits);
        $goods->specificat = $specificat;
        $goods->categoryId = $goodsDto->categoryId;

        $this->goodsRepository->store($goods);

        return $goods;
    }

    public function goodsLst(RequestDto $goodsDto){
        $goodsLst = $this->goodsRepository->findAll();
        return $goodsLst;
    }

}