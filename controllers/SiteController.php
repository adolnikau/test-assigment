<?php

namespace app\controllers;

use yii\web;

use app\interfaces;

class SiteController extends web\Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Render single user stats
     *
     * @param string $users
     * @param string $platforms
     * @return string
     */
    public function actionIndex(array $users, array $platforms)
    {
        $mplatforms = [];
        foreach ($platforms as $platform) {
            $mplatforms[] = \Yii::$app->factory->create($platform);
        }
        $users = \Yii::$app->searcher->search($mplatforms, $users);
        return $this->render('index', ['users' => $users]);
    }
}
