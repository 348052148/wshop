<?php
namespace Service;

use Zend\ServiceManager\AbstractPluginManager;

class MicroServiceManager extends AbstractPluginManager{

    public function __construct($configInstanceOrParentLocator = null, array $config = [])
    {
        parent::__construct($configInstanceOrParentLocator, $config);
    }
}