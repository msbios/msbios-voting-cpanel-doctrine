<?php

/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Voting\CPanel\Doctrine;

use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'router' => [
        'routes' => [
            'cpanel' => [
                'child_routes' => [
                    'poll' => [
                        'options' => [
                            'defaults' => [
                                'controller' => Controller\IndexController::class,
                            ],
                        ],
                    ],
                    'poll-option' => [
                        'options' => [
                            'defaults' => [
                                'controller' => Controller\OptionController::class,
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],

    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\OptionController::class => InvokableFactory::class,
        ],
    ],

    'form_elements' => [
        'aliases' => [
            // Forms
            Controller\IndexController::class =>
                \MSBios\Voting\Resource\Form\PollForm::class,
            Controller\OptionController::class =>
                \MSBios\Voting\Resource\Form\OptionForm::class,
        ]
    ],

    \MSBios\Theme\Module::class => [
        'themes' => [
            'limitless' => [
                'template_map' => [
                    // IndexController
                    'ms-bios/voting/c-panel/doctrine/index/add' =>
                        __DIR__ . '/../themes/limitless/view/ms-bios/voting/c-panel/doctrine/index/form.phtml',
                    'ms-bios/voting/c-panel/doctrine/index/edit' =>
                        __DIR__ . '/../themes/limitless/view/ms-bios/voting/c-panel/doctrine/index/form.phtml',

                    // OptionController
                    'ms-bios/voting/c-panel/doctrine/option/add' =>
                        __DIR__ . '/../themes/limitless/view/ms-bios/voting/c-panel/doctrine/option/form.phtml',
                    'ms-bios/voting/c-panel/doctrine/option/edit' =>
                        __DIR__ . '/../themes/limitless/view/ms-bios/voting/c-panel/doctrine/option/form.phtml'
                ],
                'template_path_stack' => [
                    __DIR__ . '/../themes/limitless/view/',
                ],
                'controller_map' => [
                ],
                'translation_file_patterns' => [
                    [
                        'type' => 'gettext',
                        'base_dir' => __DIR__ . '/../themes/limitless/language/',
                        'pattern' => '%s.mo',
                    ],
                ],
                'widget_manager' => [
                    'template_map' => [
                    ],
                    'template_path_stack' => [
                        __DIR__ . '/../themes/limitless/widget/'
                    ],
                ],
            ],
        ],
    ],
];
