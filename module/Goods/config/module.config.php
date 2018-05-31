<?php
namespace Goods;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\GoodsController::class => function($container){
                $mic = $container->get('MicroServiceManager');
                return new Controller\GoodsController($mic->get('GoodsService'));
            },
            Controller\GoodsCategoriesController::class => InvokableFactory::class
        ],
    ],
//    'controllers' => [
//        'factories' => [
//            Controller\AlbumController::class => function($container) {
//                return new Controller\AlbumController(
//                    $container->get(Model\AlbumTable::class)
//                );
//            },
//        ],
//    ],
//    'service_manager' =>[
//        'factories' => [
//            Model\AlbumTable::class => function($container) {
//                $tableGateway = $container->get(Model\AlbumTableGateway::class);
//                return new Model\AlbumTable($tableGateway);
//            },
//            Model\AlbumTableGateway::class => function ($container) {
//                $dbAdapter = $container->get(AdapterInterface::class);
//                $resultSetPrototype = new ResultSet();
//                $resultSetPrototype->setArrayObjectPrototype(new Model\Album());
//                return new TableGateway('album', $dbAdapter, null, $resultSetPrototype);
//            },
//        ],
//    ],

    // The following section is new and should be added to your file:
    'router' => [
        'routes' => [
            'goods' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/goods[/:action][/:id]',
                    'defaults' => [
                        'controller' => Controller\GoodsController::class,
                        'action'     => 'base',
                    ],
                ],
            ],
            'category' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/category[/:action][/:id]',
                    'defaults' => [
                        'controller' => Controller\GoodsCategoriesController::class,
                        'action'     => 'base',
                    ],
                ],
            ]
        ],
    ],



    'view_manager' => [
        'strategies' => [
            'ViewJsonStrategy', //配置view策略
        ],
        'template_path_stack' => [
            'goods' => __DIR__ . '/../view',
        ],
    ],
];


// 多主机路由
//return [
//    'router' => [
//        'routes' => [
//            'modules.zendframework.com' => [
//                'type' => 'Zend\Router\Http\Hostname',
//                'options' => [
//                    'route' => ':4th.[:3rd.]:2nd.:1st', // domain levels from right to left
//                    'constraints' => [
//                        '4th' => 'modules',
//                        '3rd' => '.*?', // optional 3rd level domain such as .ci, .dev or .test
//                        '2nd' => 'zendframework',
//                        '1st' => 'com',
//                    ],
//                    // Purposely omit default controller and action
//                    // to let the child routes control the route match
//                ],
//                // child route controllers may span multiple modules as desired
//                'child_routes' => [
//                    'index' => [
//                        'type' => 'Zend\Router\Http\Literal',
//                        'options' => [
//                            'route' => '/',
//                            'defaults' => [
//                                'controller' => 'Module\Controller\Index',
//                                'action' => 'index',
//                            ],
//                        ],
//                        'may_terminate' => true,
//                    ],
//                ],
//            ],
//            'packages.zendframework.com' => [
//                'type' => 'Zend\Router\Http\Hostname',
//                'options' => [
//                    'route' => ':4th.[:3rd.]:2nd.:1st', // domain levels from right to left
//                    'constraints' => [
//                        '4th' => 'packages',
//                        '3rd' => '.*?', // optional 3rd level domain such as .ci, .dev or .test
//                        '2nd' => 'zendframework',
//                        '1st' => 'com',
//                    ],
//                    // Purposely omit default controller and action
//                    // to let the child routes control the route match
//                ],
//                // child route controllers may span multiple modules as desired
//                'child_routes' => [
//                    'index' => [
//                        'type' => 'Zend\Router\Http\Literal',
//                        'options' => [
//                            'route' => '/',
//                            'defaults' => [
//                                'controller' => 'Package\Controller\Index',
//                                'action' => 'index',
//                            ],
//                        ],
//                        'may_terminate' => true,
//                    ],
//                ],
//            ],
//        ],
//    ],
//];

//简单路由案例
//return [
//    'router' => [
//        'routes' => [
//            // Literal route named "home"
//            'home' => [
//                'type' => 'literal',
//                'options' => [
//                    'route' => '/',
//                    'defaults' => [
//                        'controller' => 'Application\Controller\IndexController',
//                        'action' => 'index',
//                    ],
//                ],
//            ],
//            // Literal route named "contact"
//            'contact' => [
//                'type' => 'literal',
//                'options' => [
//                    'route' => 'contact',
//                    'defaults' => [
//                        'controller' => 'Application\Controller\ContactController',
//                        'action' => 'form',
//                    ],
//                ],
//            ],
//        ],
//    ],
//];


// 一个组合子路由案例
//return [
//    'router' => [
//        'routes' => [
//            // Literal route named "home"
//            'home' => [
//                'type' => 'literal',
//                'options' => [
//                    'route' => '/',
//                    'defaults' => [
//                        'controller' => 'Application\Controller\IndexController',
//                        'action' => 'index',
//                    ],
//                ],
//            ],
//            // Literal route named "blog", with child routes
//            'blog' => [
//                'type' => 'literal',
//                'options' => [
//                    'route' => '/blog',
//                    'defaults' => [
//                        'controller' => 'Application\Controller\BlogController',
//                        'action' => 'index',
//                    ],
//                ],
//                'may_terminate' => true,
//                'child_routes' => [
//                    // Segment route for viewing one blog post
//                    'post' => [
//                        'type' => 'segment',
//                        'options' => [
//                            'route' => '/[:slug]',
//                            'constraints' => [
//                                'slug' => '[a-zA-Z0-9_-]+',
//                            ],
//                            'defaults' => [
//                                'action' => 'view',
//                            ],
//                        ],
//                    ],
//                    // Literal route for viewing blog RSS feed
//                    'rss' => [
//                        'type' => 'literal',
//                        'options' => [
//                            'route' => '/rss',
//                            'defaults' => [
//                                'action' => 'rss',
//                            ],
//                        ],
//                    ],
//                ],
//            ],
//        ],
//    ],
//];