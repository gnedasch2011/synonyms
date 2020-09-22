<?php

namespace app\modules\synonyms\model;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "relations".
 *
 * @property int $id
 * @property int $id_synonymys
 * @property int $id_relations_synonymys
 */
class Relations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'relations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_synonymys', 'id_relations_synonymys'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_synonymys' => 'Id Synonymys',
            'id_relations_synonymys' => 'Id Relations Synonymys',
        ];
    }

    public static function findRelations($ids)
    {
        $res = self::find()
            ->where(['id_synonymys' => $ids])
            ->asArray()
            ->all();

        if ($res) {
            $res = ArrayHelper::getColumn($res, 'id_relations_synonymys');
        }


        return $res;
    }
}
