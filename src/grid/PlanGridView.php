<?php

namespace hipanel\modules\finance\grid;

use hipanel\grid\MainColumn;
use hipanel\grid\RefColumn;
use hipanel\helpers\Url;
use Yii;

class PlanGridView extends \hipanel\grid\BoxedGridView
{
    public function columns()
    {
        return array_merge(parent::columns(), [
            'name' => [
                'attribute' => 'name',
                'class' => MainColumn::class,
                'note' => 'note',
                'noteOptions' => [
                    'url' => Url::to(['/finance/plan/set-note']),
                ],
            ],
            'simple_name' => [
                'attribute' => 'name',
            ],
            'state' => [
                'attribute' => 'state',
                'class' => RefColumn::class,
                'filterAttribute' => 'state',
                'filterOptions' => ['class' => 'narrow-filter'],
                'format' => 'html',
                'gtype' => 'state,tariff',
            ],
            'type' => [
                'attribute' => 'type',
                'class' => RefColumn::class,
                'filterAttribute' => 'type',
                'filterOptions' => ['class' => 'narrow-filter'],
                'format' => 'html',
                'gtype' => 'type,tariff',
            ],
        ]);
    }
}