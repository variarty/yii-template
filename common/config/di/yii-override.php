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

/**
 * Customize yii\bootstrap\ActiveForm.
 * @see http://www.yiiframework.com/doc-2.0/yii-bootstrap-activeform.html
 */
Yii::$container->set(yii\bootstrap\ActiveForm::class, [
    'validateOnBlur'    => false,
    'validateOnChange'  => false,
    'successCssClass'   => '',
]);
