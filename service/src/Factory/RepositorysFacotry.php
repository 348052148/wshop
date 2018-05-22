<?php
namespace Service\Factory;

use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\Factory\FactoryInterface;

class RepositorysFacotry implements FactoryInterface{

    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $dbAdapter = $container->get(AdapterInterface::class);
        $resultSetPrototype = new ResultSet();

        $repositorys = (null === $options) ? new $requestedName : new $requestedName($options);

        $entityClass = $repositorys->getEntity();
        $tableName = $repositorys->getTable();

        $resultSetPrototype->setArrayObjectPrototype(new $entityClass());

        return new TableGateway($tableName, $dbAdapter, null, $resultSetPrototype);
    }
}