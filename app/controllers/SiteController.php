<?php
namespace app\controllers;

/**
 * @author Artem Rasskosov
 * @since 16.07.2017
 */

use Yii;
use app\forms\SignInForm;
use common\services\exceptions\WrongAuthDataException;

class SiteController extends BaseController
{
    /**
     * @var string $layout
     */
    public $layout = 'site';

    /**
     * Sign in form view.
     *
     * @return string
     */
    public function actionSignIn()
    {
        $form = new SignInForm();
        $post = Yii::$app->request->post();

        if ($form->load($post) && $form->validate()) {
            try {
                $service = $this->getUserAuthService();
                $service->signIn($form->getUserAuthDto());

                return $this->goHome();
            } catch (WrongAuthDataException $e) {
                $session = Yii::$app->getSession();
                $session->addFlash('authError', true);
            }
        }

        return $this->render('sign-in', [
            'signIn' => $form
        ]);
    }

    /**
     * Sign up form view.
     *
     * @return string
     */
    public function actionSignUp()
    {
        return $this->render('sign-up');
    }

    /**
     * Recovery password form view.
     *
     * @return string
     */
    public function actionPasswordRecovery()
    {
        return $this->render('password-recovery');
    }
}
