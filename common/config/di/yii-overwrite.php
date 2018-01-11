<?php

/**
 * Customize yii\widgets\ActiveForm.
 * @see http://www.yiiframework.com/doc-2.0/yii-widgets-activeform.html
 */
Yii::$container->set(yii\widgets\ActiveForm::class, [
    'validateOnBlur'    => false,
    'validateOnChange'  => false,
    'successCssClass'   => '',
]);
