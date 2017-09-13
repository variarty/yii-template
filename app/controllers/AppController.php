<?php
namespace app\controllers;

/**
 * Base controller for authorized user.
 * @author Artem Rasskosov
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
