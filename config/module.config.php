<?php

/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Voting\CPanel\Doctrine;

use MSBios\CPanel\Doctrine\Factory\ControllerFactory;
use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'controllers' => [
        'factories' => [
            Controller\IndexController::class =>
                ControllerFactory::class,
            Controller\OptionController::class =>
                ControllerFactory::class,
        ],
        'aliases' => [
            \MSBios\Voting\CPanel\Controller\IndexController::class =>
                Controller\IndexController::class,
            \MSBios\Voting\CPanel\Controller\OptionController::class =>
                Controller\OptionController::class
        ]
    ],

    'form_elements' => [
        'aliases' => [
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
                    // ...
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
                        // ...
                    ],
                    'template_path_stack' => [
                        __DIR__ . '/../themes/limitless/widget/'
                    ],
                ],
            ],
        ],
    ],
];
