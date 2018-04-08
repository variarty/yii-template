<?php

use yii\bootstrap\Nav;
use yii\bootstrap\Html;
use yii\bootstrap\NavBar;
use app\widgets\alert\Alert;

/* @var $content string */
/* @var $this \yii\web\View */
/* @var $identity \common\entities\user\User */

app\assets\AppAsset::register($this);

$identity = Yii::$app->user->identity;
?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="<?= Yii::$app->request->hostInfo ?>/favicon.ico" type="image/x-icon"/>

        <?= Html::csrfMetaTags() ?>
        <title><?= $this->title ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <header>
            <?php
            NavBar::begin([
                'brandLabel' => Html::icon('home'),
                'brandUrl' => '/',
                'renderInnerContainer' => false,
            ]);
            echo Nav::widget([
                'items' => [
                    [
                        'label' => Yii::t('app', 'Users'),
                        'items' => [
                            ['label' => Yii::t('app', 'List'), 'url' => ['user/list']],
                            ['label' => Yii::t('app', 'Add'), 'url' => ['user/create']],
                        ],
                    ],
                    [
                        'label' => $identity->getName()->getFirst() ?: $identity->getEmail(),
                        'items' => [
                            ['label' => Yii::t('app', 'My page'), 'url' => ['home/profile']],
                            '<li class="divider"></li>',
                            ['label' => Yii::t('app', 'Sign out'), 'url' => ['home/sign-out']],
                        ],
                    ],
                ],
                'options' => ['class' => 'navbar-nav navbar-right'],
            ]);
            NavBar::end();
            ?>
        </header>

        <div class="wrap">
            <div class="col-md-12">
                <?= Alert::widget([]); ?>
            </div>
            <?= $content ?>
        </div>

        <?php $this->endBody() ?>
    </body>
</html>

<?php $this->endPage() ?>
