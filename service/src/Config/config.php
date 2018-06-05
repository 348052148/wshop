<?php
namespace Service;
use Service\Application\services\CategoryService;
use Service\Application\services\GoodsService;
use Service\Application\services\OrderService;
use Service\Application\services\ShopService;
use Service\Application\services\UserService;
use Service\Domain\repositorys\AddressRepository;
use Service\Domain\repositorys\CartRepository;
use Service\Domain\repositorys\CategoryRepository;
use Service\Domain\repositorys\GoodsRepository;
use Service\Domain\repositorys\OrderRepository;
use Service\Domain\repositorys\ShopRepository;
use Service\Domain\repositorys\SpecificatRespository;
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
        SpecificatRespository::class => RepositorysFacotry::class,
        OrderRepository::class => RepositorysFacotry::class,
        AddressRepository::class => RepositorysFacotry::class,

        'CartService' => function($container) {
            $CartRepository = $container->get('MicroServiceManager')->get(CartRepository::class);
            $GoodsRepository = $container->get('MicroServiceManager')->get(GoodsRepository::class);
            $SpecificatRepository = $container->get('MicroServiceManager')->get(SpecificatRespository::class);
            return new CartService($CartRepository,$GoodsRepository,$SpecificatRepository);
        },
        'GoodsService' => function($container) {
            $GoodsRepository = $container->get('MicroServiceManager')->get(GoodsRepository::class);
            $SpecificatRepository = $container->get('MicroServiceManager')->get(SpecificatRespository::class);
            return new GoodsService($GoodsRepository,$SpecificatRepository);
        },
        'CategoryService' => function($container){
            $CategoryRepository = $container->get('MicroServiceManager')->get(CategoryRepository::class);
            return new CategoryService($CategoryRepository);
        },
        'ShopService' => function($container){
            $ShopRepository = $container->get('MicroServiceManager')->get(ShopRepository::class);
            return new ShopService($ShopRepository);
        },
        'OrderService' => function($container){
            $OrderRepository = $container->get('MicroServiceManager')->get(OrderRepository::class);
            $GoodsRepository = $container->get('MicroServiceManager')->get(GoodsRepository::class);
            $SpecificatRepository = $container->get('MicroServiceManager')->get(SpecificatRespository::class);
            $AddressRepository = $container->get('MicroServiceManager')->get(AddressRepository::class);
            return new OrderService($OrderRepository,$GoodsRepository,$SpecificatRepository,$AddressRepository);
        },
        'UserService' => function($container){
            $AddressRepository = $container->get('MicroServiceManager')->get(AddressRepository::class);
            $UserRepository = $container->get('MicroServiceManager')->get(UserRepository::class);
            return new UserService($UserRepository,$AddressRepository);
        }

    ]
];