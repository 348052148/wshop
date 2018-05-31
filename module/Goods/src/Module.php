<?php
namespace Goods;

use Zend\EventManager\Event;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerPluginProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\DependencyIndicatorInterface;
use Zend\ModuleManager\Feature\FormElementProviderInterface;
use Zend\ModuleManager\Feature\InitProviderInterface;
use Zend\ModuleManager\Feature\InputFilterProviderInterface;
use Zend\ModuleManager\Feature\LocatorRegisteredInterface;
use Zend\ModuleManager\Feature\LogProcessorProviderInterface;
use Zend\ModuleManager\Feature\RouteProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;
use Zend\ModuleManager\ModuleManagerInterface;
use Zend\Mvc\MvcEvent;

/**
 * Zend\Mvc\Controller\ControllerManager	controllers	ControllerProviderInterface	getControllerConfig
Zend\Mvc\Controller\PluginManager	controller_plugins	ControllerPluginProviderInterface	getControllerPluginConfig
Zend\Filter\FilterPluginManager	filters	FilterProviderInterface	getFilterConfig
Zend\Form\FormElementManager	form_elements	FormElementProviderInterface	getFormElementConfig
Zend\Stdlib\Hydrator\HydratorPluginManager	hydrators	HydratorProviderInterface	getHydratorConfig
Zend\InputFilter\InputFilterPluginManager	input_filters	InputFilterProviderInterface	getInputFilterConfig
Zend\Mvc\Router\RoutePluginManager	route_manager	RouteProviderInterface	getRouteConfig
Zend\Serializer\AdapterPluginManager	serializers	SerializerProviderInterface	getSerializerConfig
Zend\ServiceManager\ServiceManager	service_manager	ServiceProviderInterface	getServiceConfig
Zend\Validator\ValidatorPluginManager	validators	ValidatorProviderInterface	getValidatorConfig
Zend\View\HelperPluginManager	view_helpers	ViewHelperProviderInterface	getViewHelperConfig
Zend\Log\ProcessorPluginManager	log_processors	LogProcessorProviderInterface	getLogProcessorConfig
Zend\Log\WriterPluginManager	log_writers	LogWriterProviderInterface	getLogWriterConfig
 * Class DefaultListenerAggregate
 * @package Zend\ModuleManager\Listener
 */
class Module implements ConfigProviderInterface ,
    InitProviderInterface ,
    BootstrapListenerInterface ,
    ServiceProviderInterface ,
    AutoloaderProviderInterface,
    ControllerPluginProviderInterface,
    ControllerProviderInterface,
    DependencyIndicatorInterface,
    FormElementProviderInterface,
    InputFilterProviderInterface,
    LogProcessorProviderInterface,
    ViewHelperProviderInterface,
    RouteProviderInterface,
    LocatorRegisteredInterface //直接将本模块注入到serviceManager
{
    public function getRouteConfig()
    {
//        echo __FUNCTION__."->";
        // TODO: Implement getRouteConfig() method.
    }

    public function getViewHelperConfig()
    {
//        echo __FUNCTION__."->";
        // TODO: Implement getViewHelperConfig() method.
//        return [
//            'template_path_stack' => [
//                'album' => __DIR__ . '/../view',
//            ],
//        ];
    }

    public function getLogProcessorConfig()
    {
//        echo __FUNCTION__."->";
        // TODO: Implement getLogProcessorConfig() method.
    }

    public function getInputFilterConfig()
    {
//        echo __FUNCTION__."->";
        // TODO: Implement getInputFilterConfig() method.
    }

    public function getFormElementConfig()
    {
//        echo __FUNCTION__."->";
        // TODO: Implement getFormElementConfig() method.
    }

    public function getFilter()
    {
//        echo __FUNCTION__."->";
        // TODO: Implement getFilter() method.
    }

    public function getModuleDependencies()
    {
//        echo __FUNCTION__."->";
        // TODO: Implement getModuleDependencies() method. 检查已经加载的模块是否存在。
        return [
          'Application'
        ];
    }

    public function getControllerPluginConfig()
    {
//        echo __FUNCTION__."->";
        // TODO: Implement getControllerPluginConfig() method.
    }

    public function getConfig()
    {
//        echo __FUNCTION__."->"; //进入主应用配置
        return include __DIR__ . '/../config/module.config.php';
    }

    //配置返回并聚合到serviceManager
    public function getServiceConfig()
    {
//        echo 'Service->';
//        return [
//            'factories' => [
//                Model\AlbumTable::class => function($container) {
//                    $tableGateway = $container->get(Model\AlbumTableGateway::class);
//                    return new Model\AlbumTable($tableGateway);
//                },
//                Model\AlbumTableGateway::class => function ($container) {
//                    $dbAdapter = $container->get(AdapterInterface::class);
//                    $resultSetPrototype = new ResultSet();
//                    $resultSetPrototype->setArrayObjectPrototype(new Model\Album());
//                    return new TableGateway('album', $dbAdapter, null, $resultSetPrototype);
//                },
//            ],
//        ];
    }

    public function getAutoloaderConfig()
    {
//        echo 'Autoload->';
        // TODO: Implement getAutoloaderConfig() method. zend/load/autoloadFactory
        //实现自动加载机制
//        return [
//            'Zend\Loader\ClassMapAutoloader' => [
//                __DIR__ . '/autoload_classmap.php',
//            ],
//            'Zend\Loader\StandardAutoloader' => [
//                'namespaces' => [
//                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
//                ],
//            ],
//        ];
    }

    public function getControllerConfig()
    {
//        echo 'Controller->';
//        return [
//            'factories' => [
//                Controller\AlbumController::class => function($container) {
//                    return new Controller\AlbumController(
//                        $container->get(Model\AlbumTable::class)
//                    );
//                },
//            ],
//        ];
    }

    public function init(ModuleManagerInterface $manager)
    {
//        var_dump($manager->getEventManager());
//        echo 'INIT->';
        // TODO: Implement init() method. 执行轻量任务
        // Remember to keep the init() method as lightweight as possible
        $events = $manager->getEventManager();
        $events->attach('loadModules.post', [$this, 'modulesLoaded']);
    }

    public function modulesLoaded(Event $e)
    {
        $mic = $e->getParam('ServiceManager')->get('MicroServiceManager');
        var_dump($mic->get('CartService')->test());
        // This method is called once all modules are loaded.
//        $moduleManager = $e->getTarget();
//        $loadedModules = $moduleManager->getLoadedModules();

        // To get the configuration from another module named 'FooModule'
//        $config = $moduleManager->getModule('FooModule')->getConfig();
    }

    public function onBootstrap(EventInterface $e)
    {
//        $app = $e->getParam('application');
//        $app->getEventManager()->attach('render', [$this, 'registerJsonStrategy'], 100);
//        //设置Layout
//        $app->getEventManager()->attach('dispatch', [$this, 'setLayout']);
//        echo 'Bootstrap->';
        // TODO: Implement onBootstrap() method. 执行轻量任务  在app bootstrap 事件中触发
    }

//    /**
//     * @param  MvcEvent $e The MvcEvent instance
//     * @return void
//     */
//    public function setLayout(MvcEvent $e)
//    {
//        $matches    = $e->getRouteMatch();
//        $controller = $matches->getParam('controller');
//        if (false === strpos($controller, __NAMESPACE__)) {
//            // not a controller from this module
//            return;
//        }
//
//        // Set the layout template
//        $viewModel = $e->getViewModel();
//        $viewModel->setTemplate('content/layout');
//    }
//
//
//    /**
//     * @param  MvcEvent $e The MvcEvent instance
//     * @return void
//     */
//    public function registerJsonStrategy(MvcEvent $e)
//    {
//        $matches    = $e->getRouteMatch();
//        $controller = $matches->getParam('controller');
//        if (false === strpos($controller, __NAMESPACE__)) {
//            // not a controller from this module
//            return;
//        }
//
//        // Potentially, you could be even more selective at this point, and test
//        // for specific controller classes, and even specific actions or request
//        // methods.
//
//        // Set the JSON strategy when controllers from this module are selected
//        $app          = $e->getTarget();
//        $locator      = $app->getServiceManager();
//        $view         = $locator->get('Zend\View\View');
//        $jsonStrategy = $locator->get('ViewJsonStrategy');
//
//        // Attach strategy, which is a listener aggregate, at high priority
//        $view->getEventManager()->attach($jsonStrategy, 100);
//    }
}