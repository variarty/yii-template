<?php
namespace app\controllers;

/**
 * Main controller for unauthorized user.
 * @author Artem Rasskosov
 */

use Yii;
use app\forms\SignInForm;
use app\forms\SignUpForm;
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
                $service->signIn($form->getDto());

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
        $form = new SignUpForm();
        $post = Yii::$app->request->post();

        if ($form->load($post) && $form->validate()) {
            $service = $this->getUserRegistrationService();
            $service->signUp($form->getDto());

            return $this->goHome();
        }

        return $this->render('sign-up', [
            'signUp' => $form
        ]);
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
