<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 21.09.2020
 * Time: 9:11
 */

namespace frontend\controllers;


use app\models\synonyms\Synonymys;
use frontend\models\form\SearchQuery;
use yii\web\Controller;

class SynonymsController extends Controller
{
    public function actionSearch()
    {
        $SearchQuery = new SearchQuery();

        if ($SearchQuery->load(\Yii::$app->request->post()) && $SearchQuery->validate()) {

            $allSynonyms = Synonymys::findAllSynonyms($SearchQuery->query);

            return $this->render('synonymsSearch', $allSynonyms);
        }

    }
}