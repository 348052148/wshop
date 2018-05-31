<?php
namespace Service\Application\services;

use Service\Domain\cart\Cart;
use Service\Domain\repositorys\CartRepository;
use Service\Domain\repositorys\GoodsRepository;
use UI\dtos\RequestDto;

class CartService {

    private $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }


    public function addGoodsToCart(RequestDto $goodsDto){
        $goodsRepository = new GoodsRepository();
        $goods = $goodsRepository->findById($goodsDto->sku);
        $cartRepository = new CartRepository();

        $cart = $cartRepository->findById($goodsDto->cartId);

        $cart->addGoods($goods,$goodsDto->num);

        $cartRepository->store($cart);
    }

    public function getCart(RequestDto $cartDto){
        $cartRepository = new CartRepository();

        $cart = $cartRepository->findById($cartDto->cartId);

        return $cart;
    }

    public function removeGoodsToCart(RequestDto $goodsDto){
        $cartRepository = new CartRepository();
        $cart = $cartRepository->findById($goodsDto->cartId);
        $cart->removeGoods($goodsDto->goodsId);

        $cartRepository->store($cart);
    }

    public function test(){
       var_dump(iterator_to_array($this->repository->findAll()));
    }
}