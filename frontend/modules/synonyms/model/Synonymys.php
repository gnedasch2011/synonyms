<?php

namespace app\modules\synonyms\model;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "synonymys".
 *
 * @property int $id
 * @property string $name
 */
class Synonymys extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'synonymys';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }


    public static function synonymsFindAll($query)
    {

        $res = self::find()
            ->where(['name' => $query])
            ->asArray()
            ->all();

        if ($res) {
            $ids = ArrayHelper::getColumn($res, 'id');
        }

        $out = self::returnRelationsSynonyms($res);

        if (empty($out) && isset($res)) {
            $out = self::returnRelationsFromSynonyms($res);
        }

        return $out;
    }

    public static function synonymsWithTheSameStart($query)
    {
//        $query = 'жизнь';

        $out = self::find()
            ->where(['like', 'name', $query . "%", false])
            ->andWhere(['not like', 'name', $query, false])
            ->asArray()
            ->all();


        return $out;

    }

    public static function synonymsWithTheSameFinal($query)
    {
//        $query = 'жизнь';

        $out = self::find()
            ->where(['like', 'name', "%" . $query, false])
            ->andWhere(['not like', 'name', $query, false])
            ->asArray()
            ->all();


        return $out;

    }


    public static function returnRelationsSynonyms($res)
    {
        if ($res) {
            $ids = ArrayHelper::getColumn($res, 'id');
        }

        $relationsIds = Relations::findRelations($ids);

        $synonymsArr = self::find()
            ->where(['id' => $relationsIds])
            ->asArray()
            ->all();


        return $synonymsArr;
    }


    public static function returnRelationsFromSynonyms($res)
    {
        if ($res) {
            $ids = ArrayHelper::getColumn($res, 'id');
        }

        $relationsIds = Relations::findRelationsFromSynonyms($ids);

        $synonymsArr = self::find()
            ->where(['id' => $relationsIds])
            ->asArray()
            ->all();


        return $synonymsArr;
    }


    public static function prepareForView($arr)
    {
        $out = [];

        foreach ($arr as $item) {
            $out[$item['id']]['name'] = $item['name'];
            $out[$item['id']]['url'] = '/synonyms/' . $item['name'];
        }

        return $out;

    }

    public static function synonymsInOneLine($synonymsFindAll)
    {
        $out = '';

        foreach ($synonymsFindAll as $item) {
            $out .= $item['name'] . '; ';
        }

        return $out;
    }

}
