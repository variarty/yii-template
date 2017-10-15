<?php

use yii\helpers\Url;
use yii\helpers\Html;

/**
 * @var common\entities\user\User $user;
 * @var string $token;
 * @var string $url;
 */
echo Yii::t('mail', 'To recover your password, click on the link below: {link}.', [
    'link' => Html::a(
        $url = Url::to(['password-change', 'token' => $token], true),
        $url
    ),
]);
