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
            $this->view->title = 'Поиск синонимов';
                $this->view->registerMetaTag(
                  ['name' => 'description', 'content' => 'Поиск синонимов']
                );

        $popularWordsAll = Synonymys::findPopulars();
        $popularWords = Synonymys::prepareForView($popularWordsAll);

        return $this->render('MainPage', [
            'popularWords' => $popularWords,
        ]);
    }


    public function actionSearchQuery()
    {
        if (\Yii::$app->request->get('SearchQuery')) {
            $SearchQuery = new SearchQuery();


            $SearchQuery->query = \Yii::$app->request->get('SearchQuery');

            $this->view->title = "Синоним к слову {$SearchQuery->query}";

            $this->view->params['breadcrumbs'][] = array(
                'label' => "Синоним к слову {$SearchQuery->query}",
            );

            $searchQuery = $SearchQuery->query;

            $synonymsFindAll = Synonymys::synonymsFindAll($searchQuery);
            $synonymsFindAll = Synonymys::prepareForView($synonymsFindAll);


            if (!empty($synonymsFindAll)) {
                $synonymsForDescription = array_slice($synonymsFindAll, 0, 4);

                $synonymsForDescriptionStr = '';
                foreach ($synonymsForDescription as $item) {
                    $synonymsForDescriptionStr .= $item['name'] . ', ';
                }

                $synonymsForDescriptionStr = mb_substr($synonymsForDescriptionStr, 0, -2);
            }

            $countSynonyms = count($synonymsFindAll);


            $this->view->registerMetaTag(
                ['name' => 'description', 'content' => "Синонимы к слову {$SearchQuery->query}: {$synonymsForDescriptionStr} | Узнать все  {$countSynonyms} синонимов слова {$SearchQuery->query}"]
            );


            $synonymsWithTheSameStart = Synonymys::synonymsWithTheSameStart($searchQuery);
            $synonymsWithTheSameStart = Synonymys::prepareForView($synonymsWithTheSameStart);


            $synonymsWithTheSameFinal = Synonymys::synonymsWithTheSameFinal($searchQuery);
            $synonymsWithTheSameFinal = Synonymys::prepareForView($synonymsWithTheSameFinal);


            $synonymsInOneLine = Synonymys::synonymsInOneLine($synonymsFindAll);

            return $this->render('/default/list', [
                'synonymsFindAll' => $synonymsFindAll,
                'synonymsWithTheSameFinal' => $synonymsWithTheSameFinal,
                'synonymsWithTheSameStart' => $synonymsWithTheSameStart,
                'synonymsInOneLine' => $synonymsInOneLine,
                'searchQuery' => $searchQuery,
            ]);
        }


    }


}