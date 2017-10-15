<?php
namespace app\controllers;

/**
 * Main controller for unauthorized user.
 * @author Artem Rasskosov
 */

use Yii;

use app\forms\{
    SignInForm,
    SignUpForm,
    PasswordChangeForm,
    PasswordRecoveryForm
};

use common\services\{
    UserAuthService,
    UserRegistrationService,
    UserPasswordRecoveryService,
    exceptions\WrongAuthDataException
};

use yii\web\NotFoundHttpException;

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
                /** @var UserAuthService $service */
                $service = $this->get('userAuth');
                $service->signIn($form->getDto());

                return $this->goHome();
            } catch (WrongAuthDataException $e) {
                $session = Yii::$app->getSession();
                $session->addFlash('authError');
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
            /** @var UserRegistrationService $service */
            $service = $this->get('userRegistration');
            $service->signUp($form->getDto());

            return $this->goHome();
        }

        return $this->render('sign-up', [
            'signUp' => $form
        ]);
    }

    /**
     * Recovery password STEP 1.
     * Send email.
     *
     * @return string
     */
    public function actionPasswordRecovery()
    {
        $form = new PasswordRecoveryForm();
        $post = Yii::$app->request->post();

        if ($form->load($post) && $form->validate()) {
            /** @var UserPasswordRecoveryService $service */
            $service = $this->get('userPasswordRecovery');
            $service->sendEmail($form->getDto());

            $session = Yii::$app->getSession();
            $session->addFlash('emailSend');
        }

        return $this->render('password-recovery', [
            'passwordRecovery' => $form,
        ]);
    }

    /**
     * Recovery password STEP 2.
     * Change password.
     *
     * @throws NotFoundHttpException
     * @param string $token
     * @return string
     */
    public function actionPasswordChange(string $token)
    {
        /** @var UserPasswordRecoveryService $service */
        $service = $this->get('userPasswordRecovery');

        if (!$service->isEmailSent($token)) {
            throw new NotFoundHttpException(Yii::t('app/error', 'User not found.'));
        }

        $form = new PasswordChangeForm();
        $post = Yii::$app->request->post();

        if ($form->load($post) && $form->validate()) {
            $service->changePassword($token, $form->password);

            $session = Yii::$app->getSession();
            $session->addFlash('passwordChanged');

            return $this->redirect(['sign-in']);
        }

        return $this->render('password-change', [
            'passwordChange' => $form,
        ]);
    }
}
