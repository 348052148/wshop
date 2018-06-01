<?php
namespace Service;
use Service\Application\services\CategoryService;
use Service\Application\services\GoodsService;
use Service\Application\services\ShopService;
use Service\Domain\repositorys\CartRepository;
use Service\Domain\repositorys\CategoryRepository;
use Service\Domain\repositorys\GoodsRepository;
use Service\Domain\repositorys\OrderRepository;
use Service\Domain\repositorys\ShopRepository;
use Service\Domain\repositorys\UserRepository;
use Service\Application\services\CartService;
use Service\Factory\RepositorysFacotry;

return [
    'factories' => [
        CartRepository::class => RepositorysFacotry::class,
        CategoryRepository::class => RepositorysFacotry::class,
        GoodsRepository::class => RepositorysFacotry::class,
        OrderRepository::class => RepositorysFacotry::class,
        UserRepository::class => RepositorysFacotry::class,
        ShopRepository::class => RepositorysFacotry::class,

        'CartService' => function($container) {
            $CartRepository = $container->get('MicroServiceManager')->get(CartRepository::class);
            return new CartService($CartRepository);
        },
        'GoodsService' => function($container) {
            $GoodsRepository = $container->get('MicroServiceManager')->get(GoodsRepository::class);
            return new GoodsService($GoodsRepository);
        },
        'CategoryService' => function($container){
            $CategoryRepository = $container->get('MicroServiceManager')->get(CategoryRepository::class);
            return new CategoryService($CategoryRepository);
        },
        'ShopService' => function($container){
            $ShopRepository = $container->get('MicroServiceManager')->get(ShopRepository::class);
            return new ShopService($ShopRepository);
        }

    ]
];