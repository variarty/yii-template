<?php

/**
 * Declare some repositories
 */
Yii::$container->set(
    common\repositories\UserRepositoryInterface::class,
    common\repositories\UserRepository::class
);

/**
 * Declare some services
 */
Yii::$container->set(
    'userAuth',
    common\services\UserAuthService::class
);

Yii::$container->set(
    'userRegistration',
    common\services\UserRegistrationService::class
);

Yii::$container->set(
    'userPasswordResetRequest',
    common\services\UserPasswordResetRequestService::class
);

Yii::$container->set(
    'userPasswordReset',
    common\services\UserPasswordResetService::class
);

/**
 * Customize yii\widgets\ActiveForm.
 * @see http://www.yiiframework.com/doc-2.0/yii-widgets-activeform.html
 */
Yii::$container->set(yii\widgets\ActiveForm::class, [
    'validateOnBlur'    => false,
    'validateOnChange'  => false,
]);

/**
 * Set component for MailerInterface.
 * @see http://www.yiiframework.com/doc-2.0/yii-mail-mailerinterface.html
 */
Yii::$container->set(yii\mail\MailerInterface::class, function() {
    return Yii::$app->mailer;
});
