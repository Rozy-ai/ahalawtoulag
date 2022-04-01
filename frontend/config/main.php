<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'pages' => [
            'class' => 'bupy7\pages\Module',
            'controllerMap' => [
                'default' => 'frontend\controllers\pages\DefaultController'
            ],
        ],
        'gridview'=>[
            'class'=>'\kartik\grid\Module',
            // other module settings
        ]
    ],
    'components' => [
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@bupy7/pages/views' => '@frontend/views/pages'
                ],
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        /*'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],*/
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-garaja',//frontend
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'suffix' => '.html',
            'rules' => [
                [
                    'pattern'=>'/',
                    'route' => 'site/index',
                    'suffix' => '',
                ],
                'news/<action:\w+>' => 'news/<action>',
                '<language>/<action:\w+>' => 'site/<action>',
                //'<page:[\w-]+>' => 'pages/default/index',
                '<language>/page/<page:[\w-]+>' => 'pages/default/index',
                '<language>/questions/index' => 'questions/index',
                '<language>/questions/<slug>' => 'questions/view',
                '<language>/services/index' => 'services/index',
                '<language>/services/details/<id>' => 'services/details',
                ['pattern' => 'sitemap', 'route' => 'sitemap/index', 'suffix' => '.xml'],
                ['pattern' => 'sitemap-<target:[a-z-]+>-<language>-<start:\d+>', 'route' => 'sitemap/<target>', 'suffix' => '.xml'],
                ['pattern' => 'sitemap-<target:[a-z-]+>-<language>', 'route' => 'sitemap/<target>', 'suffix' => '.xml'],
                ['pattern' => 'sitemap-<target:[a-z-]+>', 'route' => 'sitemap/<target>', 'suffix' => '.xml'],
            ],
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
