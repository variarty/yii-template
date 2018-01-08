<?php
namespace app\controllers;

/**
 * Main page for authorized user.
 * @author Artem Rasskosov
 */

use Yii;
use yii\web\Response;

class HomeController extends AppController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
       return $this->render('index');
    }

    /**
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['site/sign-in']);
    }
}
