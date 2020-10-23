<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 25.11.2019
 * Time: 8:43
 */

namespace common\widgets\adversting;


class AdverstingWidget extends \yii\base\Widget
{
    public $template;
    public $blockId;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('block', [
            'blockId' => $this->blockId,
        ]);
    }
}