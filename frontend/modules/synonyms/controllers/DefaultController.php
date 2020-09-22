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

            $searchQuery = $SearchQuery->query;

            $synonymsFindAll = Synonymys::synonymsFindAll($searchQuery);
            $synonymsWithTheSameStart = Synonymys::synonymsWithTheSameStart($searchQuery);

            $synonymsFindAll = Synonymys::prepareForView($synonymsFindAll);

            $synonymsWithTheSameStart = Synonymys::prepareForView($synonymsWithTheSameStart);


        echo "<pre>"; print_r($synonymsWithTheSameStart);die();


            return $this->render('/default/list', [
                'synonymsFindAll' => $synonymsFindAll,
                'synonymsWithTheSameStart' => $synonymsWithTheSameStart,
                'searchQuery' => $searchQuery,
            ]);
        }


    }


}