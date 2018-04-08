<?php

use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

/** @var $this yii\web\View */
/** @var $form yii\widgets\ActiveForm */
/** @var $passwordReset app\forms\PasswordResetForm */
?>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php
                $form = ActiveForm::begin();

                echo $form->field($passwordReset, 'password')->input('password', [
                    'placeholder' => $passwordReset->getAttributeLabel('password'),
                ])->label(false);

                echo $form->field($passwordReset, 'passwordRepeat')->input('password', [
                    'placeholder' => $passwordReset->getAttributeLabel('passwordRepeat'),
                ])->label(false);

                echo Html::submitButton(Yii::t('app', 'Change password'), ['class' => 'btn btn-primary pull-right']);
                ActiveForm::end();
                ?>
            </div>
        </div>
    </div>
</div>
