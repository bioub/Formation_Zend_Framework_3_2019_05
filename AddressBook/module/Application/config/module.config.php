<?php

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => \Zend\Router\Http\Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => \Application\Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'contact' => [
                'type'    => \Zend\Router\Http\Literal::class,
                'options' => [
                    'route'    => '/contacts',
                    'defaults' => [
                        'controller' => \Application\Controller\ContactController::class,
                        'action'     => 'list',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'show' => [
                        'type'    => \Zend\Router\Http\Segment::class,
                        'options' => [
                            'route'    => '/:id',
                            'defaults' => [
                                'action'     => 'show',
                            ],
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'update' => [
                                'type'    => \Zend\Router\Http\Literal::class,
                                'options' => [
                                    'route'    => '/update',
                                    'defaults' => [
                                        'action'     => 'update',
                                    ],
                                ],
                            ],
                            'delete' => [
                                'type'    => \Zend\Router\Http\Literal::class,
                                'options' => [
                                    'route'    => '/delete',
                                    'defaults' => [
                                        'action'     => 'delete',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'add' => [
                        'type'    => \Zend\Router\Http\Literal::class,
                        'options' => [
                            'route'    => '/add',
                            'defaults' => [
                                'action'     => 'add',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            \Application\Controller\IndexController::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \Application\Controller\ContactController::class => \Application\Controller\ContactControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            \PDO::class => \Application\Service\PDOFactory::class,
            \Application\Service\ContactPDOService::class => \Application\Service\ContactPDOServiceFactory::class,
            \Application\Service\ContactZendDbService::class => \Application\Service\ContactZendDbServiceFactory::class,
        ],
        'aliases' => [
            \Application\Service\ContactServiceInterface::class => \Application\Service\ContactZendDbService::class,
        ]
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
