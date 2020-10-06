<?php

namespace app\modules\synonyms\model;

use Yii;

/**
 * This is the model class for table "popular_synonymys".
 *
 * @property int $id
 * @property int $synonymys_id
 * @property int $frequency
 */
class PopularSynonymys extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'popular_synonymys';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['synonymys_id', 'frequency'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'synonymys_id' => 'Synonymys ID',
            'frequency' => 'Frequency',
        ];
    }
}
