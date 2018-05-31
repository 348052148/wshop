<?php
namespace Service\Application\services;

use Service\Domain\models\goods\Goods;

class GoodsService  {

    private $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function addGoods($goodsDto){
        $goods = new Goods();
        $goods->title = $goodsDto['title'];
        $goods->subTitle = $goodsDto['subTitle'];
        $goods->type = $goodsDto['type'];
        $goods->originalPrice = $goodsDto['originalPrice'];
        $goods->sku = $goodsDto['sku'];
        $goods->categoryId = intval($goodsDto['categoryId']);
        $goods->mode = $goodsDto['mode'];
        $goods->tags = explode(';',$goodsDto['tags']);
        $goods->desc = $goodsDto['desc'];

        $this->repository->save($goods);

        return $goods;
    }

    public function updateGoods($goodsDto){
        $goods = new Goods();

        $goods->title = $goodsDto['title'];
        $goods->subTitle = $goodsDto['subTitle'];
        $goods->type = $goodsDto['type'];
        $goods->originalPrice = $goodsDto['originalPrice'];
        $goods->sku = $goodsDto['sku'];
        $goods->categoryId = intval($goodsDto['categoryId']);
        $goods->mode = $goodsDto['mode'];
        $goods->tags = explode(';',$goodsDto['tags']);
        $goods->desc = $goodsDto['desc'];

        $this->repository->save($goods);

        return $goods;
    }

    public function goodsLst(){
        $goodsLst = $this->repository->findAll();
        return $goodsLst;
    }

}