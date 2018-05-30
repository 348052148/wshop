<?php
namespace Stock;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\CommodityStockController::class => InvokableFactory::class,
            Controller\CommodityInventoryController::class => InvokableFactory::class,
            Controller\CommodityLossContorlloer::class => InvokableFactory::class,
            Controller\CommodityBalanceController::class => InvokableFactory::class,
            Controller\CommodityBillController::class => InvokableFactory::class
        ],
    ],

    // The following section is new and should be added to your file:
    'router' => [
        'routes' => [
            'commodity-stock' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/commodity-stock[/:action][/:id]',
                    'defaults' => [
                        'controller' => Controller\CommodityStockController::class,
                        'action'     => 'base',
                    ],
                ],
            ],
            'commodity-inventory' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/commodity-inventory[/:action][/:id]',
                    'defaults' => [
                        'controller' => Controller\CommodityInventoryController::class,
                        'action'     => 'base',
                    ],
                ],
            ],
            'commodity-loss' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/commodity-loss[/:action][/:id]',
                    'defaults' => [
                        'controller' => Controller\CommodityLossContorlloer::class,
                        'action'     => 'base',
                    ],
                ],
            ],
            'commodity-balance' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/commodity-balance[/:action][/:id]',
                    'defaults' => [
                        'controller' => Controller\CommodityBalanceController::class,
                        'action'     => 'base',
                    ],
                ],
            ],
            'commodity-bill' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/commodity-bill[/:action][/:id]',
                    'defaults' => [
                        'controller' => Controller\CommodityBillController::class,
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
            __DIR__ . '/../view',
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