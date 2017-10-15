<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var $this yii\web\View */
/** @var $form yii\widgets\ActiveForm */
/** @var $passwordChange app\forms\PasswordChangeForm */
?>


<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php
                $form = ActiveForm::begin();

                echo $form->field($passwordChange, 'password')->input('password', [
                    'placeholder' => Yii::t('app', 'New password'),
                ])->label(false);

                echo $form->field($passwordChange, 'passwordRepeat')->input('password', [
                    'placeholder' => Yii::t('app', 'Repeat password'),
                ])->label(false);

                echo Html::submitButton(Yii::t('app', 'Change password'), ['class' => 'btn btn-primary pull-right']);
                ActiveForm::end();
                ?>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <?php if (Yii::$app->getSession()->hasFlash('passwordChanged')) : ?>
            <div class="alert alert-success" role="alert">
                <?= Yii::t('app/msg', 'Password changed successfully.')?>
            </div>
        <?php endif; ?>
    </div>

</div>
