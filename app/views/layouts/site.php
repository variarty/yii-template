<?php

use yii\bootstrap\Nav;
use yii\bootstrap\Html;
use yii\bootstrap\NavBar;
use app\widgets\alert\Alert;

/* @var $content string */
/* @var $this \yii\web\View */

app\assets\AppAsset::register($this);
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
                'brandLabel' => Yii::$app->id,
                'brandUrl' => '/sign-in',
            ]);
            echo Nav::widget([
                'items' => [
                    ['label' => Yii::t('app', 'Sign in'), 'url' => ['site/sign-in']],
                    ['label' => Yii::t('app', 'Sign up'), 'url' => ['site/sign-up']],
                ],
                'options' => ['class' => 'navbar-nav navbar-right'],
            ]);
            NavBar::end();
            ?>
        </header>

        <div class="wrap container">
            <?= Alert::widget([]); ?>
            <?= $content ?>
        </div>

        <footer class="container">
            <?= Yii::powered() ?>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>

<?php $this->endPage() ?>
