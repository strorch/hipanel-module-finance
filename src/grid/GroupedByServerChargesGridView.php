<?php

namespace hipanel\modules\finance\grid;

use hipanel\modules\finance\models\Charge;
use hipanel\modules\finance\helpers\ChargeSort;
use Yii;
use \yii\data\ArrayDataProvider;

/**
 * Class GroupedChargesGridView
 */
class GroupedByServerChargesGridView extends BillGridView
{

    /**
     * @var Charge[]
     */
    public $idToNameObject;

    /**
     * @var Charge[][]
     */
    public $chargesByMainObject;

    public function init()
    {
        parent::init();
        $this->initAfterRow();
    }

    public function columns()
    {
        return array_merge(parent::columns(), [
            'object_link' => [
                'format' => 'html',
                'attribute' => 'commonObject.name',
            ],
        ]);
    }

    private function initAfterRow(): void
    {
        /**
         * @param Charge $obj
         * @return string
         */
        $this->afterRow = function (Charge $obj) {
            $models = $this->chargesByMainObject[$obj->commonObject->id];
            if (empty($models)) {
                return '';
            }

            return GroupedChargesGridView::widget([
                'boxed'        => false,
                'showHeader'   => true,
                'showFooter'   => false,
                'options'      => [
                    'tag' => 'tr',
                    'id'  => crc32(reset($models)->id ?? microtime(true)),
                ],
                'layout'       => '<td colspan="' . \count($this->columns) . '">{items}</td>',
                'dataProvider' => new ArrayDataProvider([
                    'allModels'  => ChargeSort::anyCharges()->values($models, true),
                    'sort'       => false,
                    'pagination' => false
                ]),
                'tableOptions' => [
                    'class' => 'table table-striped table-bordered'
                ],
                'columns'      => array_filter([
                    Yii::$app->user->can('bill.update') ? 'checkbox' : null,
                    'type_label', 'label',
                    'quantity', 'sum', 'sum_with_children', 'time',
                ]),
            ]);
        };
    }
}
