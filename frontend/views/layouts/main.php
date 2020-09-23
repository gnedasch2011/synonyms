<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="image/x-icon" href="/images/main/favicon/favicon.ico" rel="icon">
    <script src="/js/metrika.js"></script>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?= $this->render("@app/views/block/headers/_header.php"); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php
            // $this is the view object currently being used
            echo Breadcrumbs::widget([
                'homeLink' => [
                    'label' => 'Подбор синонимов',
                    'url' => Yii::$app->homeUrl,
                    'title' => 'Подбор синонимов',
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]);
            ?>
        </div>
        <?= $content ?>
    </div>
</div>
<?php
echo common\widgets\micromark\MicromarkWidget::widget([
    'items' => $this->params['breadcrumbs'] ?? [],
    'template' => 'breadcrubs',
]);
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
