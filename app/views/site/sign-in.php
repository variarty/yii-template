<?php

use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

/** @var $this yii\web\View */
/** @var $signIn app\forms\SignInForm */
/** @var $form yii\widgets\ActiveForm */

?>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php
                $form = ActiveForm::begin();

                echo $form->field($signIn, 'email')->input('email', [
                    'placeholder' => Yii::t('app', 'Your email'),
                ])->label(false);

                echo $form->field($signIn, 'password')->input('password', [
                    'placeholder' => Yii::t('app', 'Your password'),
                ])->label(false);

                echo Html::submitButton(Yii::t('app', 'Sign in'), ['class' => 'btn btn-primary pull-right']);
                ActiveForm::end();
                ?>
            </div>
            <div class="panel-footer text-right">
                <?= Html::a(Yii::t('app', 'Forgot your password?'), 'password-reset-request') ?>
            </div>
        </div>
    </div>
</div>
