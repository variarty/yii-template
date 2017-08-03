<?php

/**
 * Declare some interfaces
 */
Yii::$container->set(
    common\services\IUserAuthInterface::class,
    common\services\UserAuthService::class
);

/**
 * Customize yii\widgets\ActiveForm.
 * @see http://www.yiiframework.com/doc-2.0/yii-widgets-activeform.html
 */
Yii::$container->set(yii\widgets\ActiveForm::class, [
    'validateOnBlur'    => false,
    'validateOnChange'  => false,
]);
