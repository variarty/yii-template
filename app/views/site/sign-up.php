<?php

use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

/** @var $this yii\web\View */
/** @var $signUp app\forms\SignUpForm */
/** @var $form yii\widgets\ActiveForm */

?>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php
                $form = ActiveForm::begin();

                echo $form->field($signUp, 'email')->input('email', [
                    'placeholder' => $signUp->getAttributeLabel('email'),
                ])->label(false);

                echo $form->field($signUp, 'password')->input('password', [
                    'placeholder' => $signUp->getAttributeLabel('password'),
                ])->label(false);

                echo $form->field($signUp, 'passwordRepeat')->input('password', [
                    'placeholder' => $signUp->getAttributeLabel('passwordRepeat'),
                ])->label(false);

                echo Html::submitButton(Yii::t('app', 'Sign up'), ['class' => 'btn btn-primary pull-right']);
                ActiveForm::end();
                ?>
            </div>
        </div>
    </div>
</div>
