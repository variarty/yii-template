<?php
namespace app\controllers;

/**
 * Main page for authorized user.
 * @author Artem Rasskosov
 */

use Yii;
use yii\web\Response;

use app\forms\UserForm;

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
    public function actionSignOut()
    {
        Yii::$app->user->logout();

        return $this->redirect(['site/sign-in']);
    }

    /**
     * @return string
     */
    public function actionProfile()
    {
        $form = new UserForm();

        return $this->render('profile', [
            'user' => $form,
        ]);
    }
}
