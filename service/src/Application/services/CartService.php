<?php
namespace Service\Application\services;


use Service\Domain\models\cart\Cart;

class CartService {

    private $cartRepository;
    private $goodsRepository;
    private $specificatRepository;

    public function __construct($repository,$goodsRepository,$specificatRepository)
    {
        $this->cartRepository = $repository;
        $this->goodsRepository = $goodsRepository;
        $this->specificatRepository = $specificatRepository;
    }


    public function cartByUid($cartDto){

        return $this->cartRepository->findByUid($cartDto['uid']);
    }

    public function addGoods2Cart($cartDto){
        $cartDto['goods'];

        $goods = $this->goodsRepository->findBySku($cartDto['goods']['sku']);
        $specif = $this->specificatRepository->findBySkuUnits($cartDto['goods']['sku'],$cartDto['goods']['units']);

        $cart = new Cart();
        $cart->uid = 1;
        $cart->units = $cartDto['goods']['units'];
        $cart->pic = $goods->pic;
        $cart->title = $goods->title;
        $cart->sku = $cartDto['goods']['sku'];
        $cart->specifText = $specif->title;
        $cart->price = $specif->price;
        $cart->num = $cartDto['goods']['num'];

//        var_dump($cart->exchangeData());die;

        $this->cartRepository->save($cart);

        return $cart;
    }
}