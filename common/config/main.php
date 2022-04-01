<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],
                'yii' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],
            ],
        ],
        /*'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'suffix' => '.html',
            'rules' => [
                [
                    'pattern'=>'/',
                    'route' => 'site/index',
                    'suffix' => '',
                ],
                '<language>/<action:\w+>' => 'site/<action>',
                //'<page:[\w-]+>' => 'pages/default/index',
                '<language>/page/<page:[\w-]+>' => 'pages/default/index',
                '<language>/news/index' => 'news/index',
                '<language>/news/<slug>' => 'news/view',
                '<language>/product/index' => 'product/index',
                '<language>/product/details/<id>' => 'product/details',
                ['pattern' => 'sitemap', 'route' => 'sitemap/index', 'suffix' => '.xml'],
                ['pattern' => 'sitemap-<target:[a-z-]+>-<language>-<start:\d+>', 'route' => 'sitemap/<target>', 'suffix' => '.xml'],
                ['pattern' => 'sitemap-<target:[a-z-]+>-<language>', 'route' => 'sitemap/<target>', 'suffix' => '.xml'],
                ['pattern' => 'sitemap-<target:[a-z-]+>', 'route' => 'sitemap/<target>', 'suffix' => '.xml'],
            ],
        ],*/
    ],
    'modules' => [
        'pages' => [
            'class' => 'bupy7\pages\Module',
            'tableName' => '{{%pages}}',
            'pathToImages' => dirname(dirname(__DIR__)).'/images',
            'urlToImages' => '/images',
            'pathToFiles' => dirname(dirname(__DIR__)).'/files',
            'urlToFiles' => '/files',
            'uploadImage' => true,
            'uploadFile' => true,
            'addImage' => true,
            'addFile' => true,
            'imperaviLanguage' => 'ru',
        ],
        'gallery' => [
            'class' => 'dvizh\gallery\Module',
            'imagesStorePath' => dirname(dirname(__DIR__)).'/images/store', //path to origin images
            'imagesCachePath' => dirname(dirname(__DIR__)).'/images/cache', //path to resized copies
            'graphicsLibrary' => 'GD',
            'placeHolderPath' => '/images/store/placeholder.png',
            'adminRoles' => ['administrator', 'admin', 'sadmin'],
        ],
        /*'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            //'admins' => ['admin']
            'mailer' => [
                'sender'                => 'info@dodago.ge', // or ['no-reply@myhost.com' => 'Sender name']
                'welcomeSubject'        => 'Dodago Welcome',
                'confirmationSubject'   => 'Dodago Confirmation',
                'reconfirmationSubject' => 'Dodago Email change',
                'recoverySubject'       => 'Dodago Recovery',
            ],
        ],*/
    ]
];
