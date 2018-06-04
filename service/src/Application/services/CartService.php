<?php
namespace Service\Application\services;

use Service\Domain\cart\Cart;
use Service\Domain\repositorys\CartRepository;
use Service\Domain\repositorys\GoodsRepository;
use UI\dtos\RequestDto;

class CartService {

    private $cartRepository;

    public function __construct($repository)
    {
        $this->cartRepository = $repository;
    }


    public function cartByUid($cartDto){

        return $this->cartRepository->findByUid($cartDto['uid']);
    }
}