<?php
namespace app\controllers;

/**
 * @author Artem Rasskosov
 * @since 16.07.2017
 */

use Yii;

class HomeController extends AppController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
       return 'Home Controller';
    }
}
