<?php
namespace Service\Factory;

use Interop\Container\ContainerInterface;
use Servcie\Domain\repositorys\CartRepository;
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
        var_dump($requestedName);
//        $repositorys = (null === $options) ? new $requestedName : new $requestedName($options);
//        var_dump(class_exists(CartRepository::class));
//        var_dump($repositorys);
//        $entityClass = $repositorys->getEntity();
//        $tableName = $repositorys->getTable();

        return new CartRepository();

        $dbAdapter = $container->get(AdapterInterface::class);

        $resultSetPrototype = new ResultSet();


        $resultSetPrototype->setArrayObjectPrototype(new $entityClass());

        return new TableGateway($tableName, $dbAdapter, null, $resultSetPrototype);



//        var_dump($repositorys);die;



//        return 123;
    }
}