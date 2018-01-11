<?php

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
