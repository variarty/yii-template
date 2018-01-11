<?php

use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

/** @var $this yii\web\View */
/** @var $form yii\widgets\ActiveForm */
/** @var $passwordResetRequest app\forms\PasswordResetRequestForm */
?>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php
                $form = ActiveForm::begin();

                echo $form->field($passwordResetRequest, 'email')->input('email', [
                    'placeholder' => Yii::t('app', 'Your email'),
                ])->label(false);

                echo Html::submitButton(Yii::t('app', 'Recovery'), ['class' => 'btn btn-primary pull-right']);
                ActiveForm::end();
                ?>
            </div>
        </div>
    </div>
</div>
