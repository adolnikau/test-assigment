<?php

$params = require __DIR__ . '/params.php';

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'params' => $params,
    'github' => ['class' => 'app\components\platforms\Github'],
    'gitlab' => ['class' => 'app\components\platforms\Gitlab'],
    'bitbucket' => ['class' => 'app\components\platforms\Bitbucket'],
    'searcher' => ['class' => 'app\components\Searcher'],
    'factory' => ['class' => 'app\components\Factory']
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
