<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/** @var $this yii\web\View */
/** @var yii\widgets\ActiveForm $form */
/** @var app\forms\UserForm $user */
?>

<div class="container-fluid">
    <div class="col-md-6">
        <?php
        $form = ActiveForm::begin([
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                'horizontalCssClasses' => ['error' => '', 'hint' => '']
            ]
        ]);
        ?>
            <fieldset>
                <legend><?= Yii::t('app', 'Your data') ?></legend>
                <?php
                    echo $form->field($user, 'email')->input('email');
                    echo $form->field($user, 'name')->textInput();
                    echo $form->field($user, 'surname')->textInput();
                    echo $form->field($user, 'authKey')->textInput();
                ?>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary pull-right']); ?>
                    </div>
                </div>
            </fieldset>
        <?php ActiveForm::end(); ?>
    </div>
</div>
