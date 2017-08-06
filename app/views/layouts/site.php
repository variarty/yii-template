<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

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
                    ['label' => Yii::t('app', 'Sign up'), 'url' => ['/site/sign-up']],
                    ['label' => Yii::t('app', 'Password recovery'), 'url' => ['/site/password-recovery']],
                ],
                'options' => ['class' => 'navbar-nav navbar-right'],
            ]);
            NavBar::end();
            ?>
        </header>

        <div class="wrap container">
            <?= $content ?>
        </div>

        <footer class="container">
            <?= Yii::powered() ?>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>

<?php $this->endPage() ?>
