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
        $query = 'жизнь';

        $res = self::find()
            ->where(['name' => $query])
            ->asArray()
            ->all();

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

}
