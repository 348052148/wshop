<?php
namespace Service\Factory;

use Interop\Container\ContainerInterface;
use Servcie\Domain\repositorys\CartRepository;
use Servcie\Domain\repositorys\CategoryRepository;
use Servcie\Domain\repositorys\GoodsRepository;
use Servcie\Domain\repositorys\OrderRepository;
use Servcie\Domain\repositorys\UserRepository;
use Service\MicroServiceManager;
use Zend\ServiceManager\Factory\FactoryInterface;

class MicroServiceFactory implements FactoryInterface{

    protected $defaultConfig = [
        'factories' => [
            CartRepository::class => RepositorysFacotry::class,
            CategoryRepository::class => RepositorysFacotry::class,
            GoodsRepository::class => RepositorysFacotry::class,
            OrderRepository::class => RepositorysFacotry::class,
            UserRepository::class => RepositorysFacotry::class,
        ]
    ];

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        if($options == null) $options=[];
        return new MicroServiceManager($container,$options);
    }
}