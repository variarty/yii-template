<?php
namespace app\controllers;

/**
 * @author Artem Rasskosov
 * @since 16.07.2017
 */

use yii\filters\AccessControl;

abstract class AppController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ]
            ]
        ];
    }
}
