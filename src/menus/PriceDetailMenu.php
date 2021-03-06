<?php

namespace hipanel\modules\finance\menus;

use Yii;

class PriceDetailMenu extends \hipanel\menus\AbstractDetailMenu
{
    public $model;

    public function items()
    {
        $actions = PriceActionsMenu::create(['model' => $this->model])->items();
        $items = array_merge($actions, [
            'delete' => [
                'label' => Yii::t('hipanel', 'Delete'),
                'icon' => 'fa-trash',
                'url' => ['@price/delete', 'id' => $this->model->id],
                'encode' => false,
                'linkOptions' => [
                    'data' => [
                        'confirm' => Yii::t('hipanel', 'Are you sure you want to delete this item?'),
                        'method' => 'POST',
                        'pjax' => '0',
                    ],
                ],
                'visible' => true,
            ],
        ]);
        unset($items['view']);

        return $items;
    }
}
