<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 21.09.2020
 * Time: 9:15
 */

namespace frontend\models;


use yii\base\Model;

class Synonymys extends Model
{
    public static function tableName()
    {
        return '{{%synonymys}}';
    }

    public function rules()
    {
        return [
            ['name', 'filter', 'filter' => 'trim'],
            ['name', 'required'],
            ['name', 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
        ];
    }
}