<?php

use frontend\modules\search\form\SearchQuery;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

$SearchQuery = new SearchQuery();

?>
<header>
    <div class="top_line">
        <div class="container">
            <div class="row flex">
                <div class="col-md-4">
                    <div class="top_left">
                        <div class="logo"><a href="/"><img src="/images/main/logo.png"
                                                           alt=""></a>
                        </div>
                        <span class="top_city"></span>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="top_right">
                        <?php
                        $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'options' => ['class' => 'search_block'],
                            'action' => '/search/default/index',
                        ]) ?>
                        <?= $form->field($SearchQuery, 'query', [
                            'options' => [
                                'class' => 'search',
                            ],
                        ])->textInput(['placeholder' => 'Поиск по сайту'])->label(false) ?>
                        <?= Html::submitButton('Найти', [
                            'class' => 'btn_search',
                            'placeholder' => 'Поиск по сайту',
                        ]) ?>

                        <?php ActiveForm::end() ?>
                        <?php /*?>

                            <form class="search_block" action="/search/index">
                                <input type="search" placeholder="Поиск по сайту">
                                <button class="btn_search">Найти</button>
                            </form>
   <?php */ ?>
                        <div class="top_user" hidden>
                            <button class="user_icon"></button>
                        </div>
                        <button class="toggle_btn"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="top_mnu">
        <div class="container">
            <div class="row">
                <?php /*?>

                <div class="col-md-12 flex">
                    <div class="top_mnu_item">
                        <h3>Готовые туры</h3>
                        <ul>
                            <li><a href="#">Где купить</a></li>
                            <li><a href="#">Виды туров</a></li>
                            <li><a href="#">Популярные страны</a></li>
                            <li><a href="#">Туры по России</a></li>
                            <li><a href="#">Круизы</a></li>
                        </ul>
                    </div>
                    <div class="top_mnu_item">
                        <h3>Едем сами</h3>
                        <ul>
                            <li><a href="#">Маршруты</a></li>
                            <li><a href="#">Расписание Ж/Д</a></li>
                            <li><a href="#">Аренда жилья</a></li>
                            <li><a href="#">Визы. Посольства</a></li>
                            <li><a href="#">Купить on-line</a></li>
                        </ul>
                    </div>
                    <div class="top_mnu_item">
                        <h3>Путеводитель</h3>
                        <ul>
                            <li><a href="#">Страны. Города и курорты</a></li>
                            <li><a href="#">Достопримечательности</a></li>
                            <li><a href="#">Отели</a></li>
                            <li><a href="#">Отзывы об отелях</a></li>
                            <li><a href="#">Вопросы</a></li>
                        </ul>
                    </div>
                    <div class="top_mnu_item">
                        <h3>Информация</h3>
                        <ul>
                            <li><a href="#">Новости</a></li>
                            <li><a href="#">Статьи</a></li>
                            <li><a href="#">Фоторепортажи</a></li>
                            <li><a href="#">Погода</a></li>
                            <li><a href="#">Справочник</a></li>
                        </ul>
                    </div>
                    <div class="top_mnu_item">
                        <h3>B2B</h3>
                        <ul>
                            <li><a href="#">Турбизнес</a></li>
                            <li><a href="#">События</a></li>
                            <li><a href="#">Турфирмы</a></li>
                            <li><a href="#">Сайты</a></li>
                            <li><a href="#">Календарь</a></li>
                        </ul>
                    </div>

                </div>
      <?php */ ?>
            </div>
            <div class="main-menu-top-l"></div>
        </div>
    </div>
</header>
<section class="baner_sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Yandex.RTB R-A-653585-1 -->
                <?php 
                    echo \common\widgets\adversting\AdverstingWidget::widget(['blockId'=>Yii::$app->params['advertising_block_1']]);
                 ?>
                
            </div>

        </div>
    </div>
</section>
<?php if (isset($this->params['breadcrumbs'])): ?>
    <section class="breadcrumbs_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs_block">
                        <!--                    <span>Путеводитель:</span>-->
                        <?php
                        // $this is the view object currently being used
                        echo Breadcrumbs::widget([
                            'homeLink' => [
                                'label' => Yii::$app->params['mainBreadcrumbsName'],
                                'url' => Yii::$app->homeUrl,
                                'title' => Yii::$app->params['mainBreadcrumbsName'],
                            ],
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>

