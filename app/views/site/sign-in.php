<?php

use yii\helpers\Html;
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
        </div>

        <?php if (Yii::$app->getSession()->hasFlash('authError')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= Yii::t('app/error', 'Wrong login or password')?>
            </div>
        <?php endif; ?>

    </div>
</div>
