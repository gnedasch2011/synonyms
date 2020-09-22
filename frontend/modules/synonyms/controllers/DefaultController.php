<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 22.09.2020
 * Time: 8:36
 */

namespace frontend\modules\synonyms\controllers;

use app\modules\synonyms\model\Synonymys;
use frontend\modules\search\form\SearchQuery;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionMainPage()
    {
        return $this->render('MainPage');
    }


    public function actionSearchQuery()
    {
        if (\Yii::$app->request->get('SearchQuery')) {
            $SearchQuery = new SearchQuery();


            $SearchQuery->query = \Yii::$app->request->get('SearchQuery');

            $this->view->title = '';
            $this->view->registerMetaTag(
                ['name' => 'description', 'content' => '']
            );

            $searchWord = $SearchQuery->query;

            $synonymsFindAll = Synonymys::synonymsFindAll($searchWord);

            return $this->render('/default/list', [
                'synonymsFindAll' => $synonymsFindAll,
            ]);
        }


    }


}