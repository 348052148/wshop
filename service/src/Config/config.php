<?php
namespace Service;
use Servcie\Application\services\GoodsService;
use Service\Domain\repositorys\CartRepository;
use Service\Domain\repositorys\CategoryRepository;
use Service\Domain\repositorys\GoodsRepository;
use Service\Domain\repositorys\OrderRepository;
use Service\Domain\repositorys\UserRepository;
use Service\Application\services\CartService;
use Service\Factory\RepositorysFacotry;
use Service\Factory\ServiceFacotry;

return [
    'factories' => [
        CartRepository::class => RepositorysFacotry::class,
        CategoryRepository::class => RepositorysFacotry::class,
        GoodsRepository::class => RepositorysFacotry::class,
        OrderRepository::class => RepositorysFacotry::class,
        UserRepository::class => RepositorysFacotry::class,

        'CartService' => function($container) {
            $CartRepository = $container->get('MicroServiceManager')->get(CartRepository::class);
            return new CartService($CartRepository);
        },
        'GoodsService' => function($container) {
            $GoodsRepository = $container->get('MicroServiceManager')->get(GoodsRepository::class);
            return new GoodsService($GoodsRepository);
        },

    ]
];