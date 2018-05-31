<?php
namespace Service\Factory;

use Interop\Container\ContainerInterface;
use Service\MicroServiceManager;
use Zend\ServiceManager\Factory\FactoryInterface;

class MicroServiceFactory implements FactoryInterface{

    protected $defaultConfig = [

    ];

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $this->config = include __DIR__ . '/../Config/config.php';

        if($options == null) $options=[];
        $microServiceManager = new MicroServiceManager($container,$options);
        $microServiceManager->configure($this->config);
        return $microServiceManager;
    }
}