<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

app\assets\AppAsset::register($this);
?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=<?= Yii::$app->charset ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="shortcut icon" href="<?= Yii::$app->request->hostInfo ?>/favicon.ico" type="image/x-icon" />
		
		<?= Html::csrfMetaTags() ?>
		<title><?= $this->title ?></title>
		<?php $this->head() ?>
	</head>
	<body>
		<?php $this->beginBody() ?>
		
		<header></header>
		
		<div class="wrap">
			<?= $content ?>
		</div>
		
		<?php $this->endBody() ?>
	</body>
</html>

<?php $this->endPage() ?>
