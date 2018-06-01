<?php
namespace Service\Application\services;

use Service\Domain\models\shop\Shop;

class ShopService {
    private $shopRepository;

    public function __construct($repository)
    {
        $this->shopRepository = $repository;

    }

    public function shopList(){

        $shopLst = $this->shopRepository->findAll();

        return $shopLst;
    }

    public function addShop($shopDto){

        $shop = new Shop();
        $shop->shopName = $shopDto['shopName'];
        $shop->shopAlias = $shopDto['shopAlias'];
        $shop->shopLogic = $shopDto['shopLogic'];
        $shop->shopTel = $shopDto['shopTel'];
        $shop->shopLeading = $shopDto['shopLeading'];
        $shop->shopAddress = $shopDto['shopAddress'];
        $shop->shopType = $shopDto['shopType'];
        $shop->shopPic = $shopDto['shopPic'];

        $this->shopRepository->save($shop);
    }
}