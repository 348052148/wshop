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

        $repositorys = (null === $options) ? new $requestedName : new $requestedName($options);

        $entityClass = $repositorys->getEntity();
        $tableName = $repositorys->getTable();

//        var_dump($repositorys);

        $dbAdapter = $container->get(AdapterInterface::class);

//        var_dump($dbAdapter->query('select * from cart'));


        $resultSetPrototype = new ResultSet();

//        var_dump($resultSetPrototype);

//        var_dump(class_exists($entityClass));

        $resultSetPrototype->setArrayObjectPrototype(new $entityClass());


        $table = new TableGateway($tableName, $dbAdapter, null, $resultSetPrototype);

//        var_dump($table);


        $repositorys->setTableGateway($table);

        return $repositorys;
    }
}