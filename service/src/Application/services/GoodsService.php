<?php
namespace Service\Application\services;

use Service\Domain\models\goods\Goods;

class GoodsService  {

    private $repository;

    private $specificatRepository;

    public function __construct($repository,$specificatRepository)
    {
        $this->repository = $repository;

        $this->specificatRepository = $specificatRepository;
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
        $goods->pic = $goodsDto['pic'];

        $this->repository->save($goods);

        return $goods;
    }

    public function getGoodsBySku($goodsDto){
        $goods = $this->repository->findBySku($goodsDto['sku']);

        $specifs = $this->specificatRepository->findBySku($goodsDto['sku']);

        foreach ($specifs as $specif){
            $goods->specifs[] = $specif;
        }

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
    public function goodsLst($page=0,$count=9){
//        $goodsLst = $this->repository->findAll();

        $goodsLst = $this->repository->findList($page*$count);

        $goodsArr = [];
        foreach ($goodsLst as $goods){
            $specifs = $this->specificatRepository->findBySku($goods->sku);

            foreach ($specifs as $specif){
                $goods->specifs[] = $specif;

                if($specif->isDefault == 1){
                    $goods->price = $specif->price;
                    $goods->units = $specif->units;
                }
            }

            array_push($goodsArr, $goods);
        }

        return $goodsArr;
    }

}