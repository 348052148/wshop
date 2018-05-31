<?php
namespace Service\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ServiceFacotry implements FactoryInterface{

    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $requestedName = "Service\Application\services\\".$requestedName;

        $service = (null === $options) ? new $requestedName : new $requestedName($options);

        return $service;
    }
}