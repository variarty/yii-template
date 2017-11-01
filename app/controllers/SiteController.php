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
    PasswordResetForm,
    PasswordResetRequestForm
};

use common\services\{
    UserAuthService,
    UserRegistrationService,
    UserPasswordResetService,
    UserPasswordResetRequestService,
    exceptions\UserNotFoundException,
    exceptions\UnknownErrorException,
    exceptions\WrongAuthDataException,
    exceptions\UserAlreadyExistException
};

use yii\web\{
    HttpException,
    NotFoundHttpException
};

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
                $session->addFlash('wrongAuthData');
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
            try {
                /** @var UserRegistrationService $service */
                $service = $this->get('userRegistration');
                $service->signUp($form->getDto());

                return $this->goHome();
            } catch (UserAlreadyExistException $e) {
                $session = Yii::$app->getSession();
                $session->addFlash('userAlreadyExist');
            }
        }

        return $this->render('sign-up', [
            'signUp' => $form
        ]);
    }

    /**
     * Reset password STEP 1.
     * Send email.
     *
     * @return string
     * @throws HttpException
     */
    public function actionPasswordResetRequest()
    {
        $form = new PasswordResetRequestForm();
        $post = Yii::$app->request->post();

        if ($form->load($post) && $form->validate()) {
            try {
                /** @var UserPasswordResetRequestService $service */
                $service = $this->get('userPasswordResetRequest');
                $service->resetPassword($form->email);

                $session = Yii::$app->getSession();
                $session->addFlash('passwordResetRequestSuccess');

                return $this->redirect(['sign-in']);
            } catch (UserNotFoundException $e) {
                $session = Yii::$app->getSession();
                $session->addFlash('passwordResetRequestEmailNotFound');
            } catch (UnknownErrorException $e) {
                throw new HttpException(500);
            }
        }

        return $this->render('password-reset-request', [
            'passwordResetRequest' => $form
        ]);
    }

    /**
     * Reset password STEP 2.
     * Change password.
     *
     * @throws NotFoundHttpException
     * @param string $token
     * @return string
     */
    public function actionPasswordReset(string $token)
    {
        $form = new PasswordResetForm(['token' => $token]);
        $post = Yii::$app->request->post();

        if ($form->load($post) && $form->validate()) {
            try {
                /** @var UserPasswordResetService $service */
                $service = $this->get('userPasswordReset');
                $service->resetPassword($form->getDto());

                $session = Yii::$app->getSession();
                $session->addFlash('passwordResetSuccess');

                return $this->redirect(['sign-in']);
            } catch (UserNotFoundException $e) {
                throw new NotFoundHttpException();
            }
        }

        /** @var UserPasswordResetRequestService $resetRequest */
        $resetRequest = $this->get('userPasswordResetRequest');

        if (!$resetRequest->isResetRequestExists($token)) {
            throw new NotFoundHttpException();
        }

        return $this->render('password-reset', [
            'passwordReset' => $form
        ]);
    }
}
