<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'name' => 'Admin',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'news' => [
            'class' => 'eugenekei\news\Module',
            'controllerNamespace' => 'eugenekei\news\controllers\backend',
            'imageGetUrl' => 'http://ah-insurance.com.tm/uploads/images/'
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'enablePasswordRecovery' =>false,
            'enableRegistration' =>false,
            'enableConfirmation' =>false,
            'confirmWithin' => 21600,
            'cost' => 12,
            'modelMap' => [
                'LoginForm' => 'backend\models\LoginForm',
            ],
            //'admins' => ['sadmin','test1']
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        /*'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],*/
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-garaja',//backend
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
        /*'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
        ],*/
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => '6LfVxpwUAAAAAJ577RlrtAHnCAaiKdCc7Ztl3r8W',
            'secret' => '6LfVxpwUAAAAAGJIxdE9PMcam53VyeoOVdxno8QA',
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@backend/views/user'
                ],
            ],
        ],
    ],
    'params' => $params,
];
