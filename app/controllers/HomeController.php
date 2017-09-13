<?php
namespace app\controllers;

/**
 * Main page for authorized user.
 * @author Artem Rasskosov
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
