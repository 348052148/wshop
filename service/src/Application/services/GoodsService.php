<?php
namespace Service\Application\services;

use Service\Domain\models\goods\Goods;

class GoodsService  {

    private $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    /**
     * 添加商品信息
     * @param $goodsDto
     * @return Goods
     */
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

    /**
     * 添加商品规格
     * @param $goodsDto
     * @return mixed
     */
    public function addGoodsSpecif($goodsDto){

        $goods = $this->repository->findById($goodsDto['id']);

        $goods->specificat = array_push( $goods->specificat, [
            'name' => $goodsDto['specif']['name'],
            'units' => $goodsDto['specif']['units']
        ]);

        $this->repository->save($goods);

        return $goods;
    }

    /**
     * 获取商品列表
     * @return mixed
     */
    public function goodsLst(){
        $goodsLst = $this->repository->findAll();
        return $goodsLst;
    }

}