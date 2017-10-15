<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var $this yii\web\View */
/** @var $form yii\widgets\ActiveForm */
/** @var $passwordRecovery app\forms\PasswordRecoveryForm */
?>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php
                $form = ActiveForm::begin();

                echo $form->field($passwordRecovery, 'email')->input('email', [
                    'placeholder' => Yii::t('app', 'Your email'),
                ])->label(false);

                echo Html::submitButton(Yii::t('app', 'Recovery'), ['class' => 'btn btn-primary pull-right']);
                ActiveForm::end();
                ?>
            </div>
        </div>
    </div>
</div>
