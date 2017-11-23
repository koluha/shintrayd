<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => 'admin-main.php',
            'components' => [
                'admin' => [
                    'identityClass' => 'app\modules\admin\models\AdminIdentity',
                    'class' => 'yii\web\User',
                    'enableAutoLogin' => TRUE,
                    'loginUrl' => ['admin/default/adminlogin'],
                    'identityCookie' => [
                        'name' => 'admin', // unique for backend
                    ]
                ],
            ]
        // ... другие настройки модуля ...
        ],
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
        ],
        'user' => [
            'identityClass' => 'app\models\UserIdentity',
            'enableAutoLogin' => true, //Попытка восстановить сессию, и авторизовать пользователя
            'identityCookie' => [
                'name' => 'buyer', // unique for backend
            ]
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'myhelper' => [
            'class' => 'app\components\MyhelperComponent',
        ],
        'request' => [
            'baseUrl' => '',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'TtYNgVs6pqkmf_P6GrBtGXKFxPcHj9V6',
            'enableCookieValidation' => false,
            'enableCsrfValidation' => false,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true, //  запрещаем index.php
            'showScriptName' => false, // запрещаем r= routes
            'rules' => [
            // '' => 'site/index',
            // '<action>' => 'site/<action>',
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
