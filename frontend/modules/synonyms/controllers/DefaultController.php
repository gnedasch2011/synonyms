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

            $this->view->title = "Синоним к слову {$SearchQuery->query}";
            $this->view->registerMetaTag(
                ['name' => 'description', 'content' => "Синоним к слову {$SearchQuery->query}"]
            );

            $searchQuery = $SearchQuery->query;

            $synonymsFindAll = Synonymys::synonymsFindAll($searchQuery);
            $synonymsFindAll = Synonymys::prepareForView($synonymsFindAll);

            $synonymsWithTheSameStart = Synonymys::synonymsWithTheSameStart($searchQuery);
            $synonymsWithTheSameStart = Synonymys::prepareForView($synonymsWithTheSameStart);


            $synonymsWithTheSameFinal = Synonymys::synonymsWithTheSameFinal($searchQuery);
            $synonymsWithTheSameFinal = Synonymys::prepareForView($synonymsWithTheSameFinal);



          $synonymsInOneLine =Synonymys::synonymsInOneLine($synonymsFindAll);

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