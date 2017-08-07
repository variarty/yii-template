<?php

/**
 * Declare some interfaces
 */
Yii::$container->set(
    'userAuthService',
    common\services\UserAuthService::class
);

Yii::$container->set(
    'userRegistrationService',
    common\services\UserRegistrationService::class
);

/**
 * Customize yii\widgets\ActiveForm.
 * @see http://www.yiiframework.com/doc-2.0/yii-widgets-activeform.html
 */
Yii::$container->set(yii\widgets\ActiveForm::class, [
    'validateOnBlur'    => false,
    'validateOnChange'  => false,
]);
