<?php

/*
 * Stock Module for Hipanel
 *
 * @link      https://github.com/hiqdev/hipanel-module-stock
 * @package   hipanel-module-stock
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2016, HiQDev (http://hiqdev.com/)
 */

namespace hipanel\modules\finance\widgets\combo;

use hiqdev\combo\Combo;
use yii\helpers\ArrayHelper;

class TariffCombo extends Combo
{
    /** {@inheritdoc} */
    public $type = 'tariff/name';

    /** {@inheritdoc} */
    public $name = 'tariff';

    /** {@inheritdoc} */
    public $url = '/finance/tariff/search';

    /** {@inheritdoc} */
    public $_return = ['id'];

    /** {@inheritdoc} */
    public $_rename = ['text' => 'tariff'];

    public $_primaryFilter = 'tariff_ilike';

    public $client = '';

    /**
     * @var string the type of tariff
     * @see getFilter()
     */
    public $tariffType;

    /** {@inheritdoc} */
    public function getFilter()
    {
        return ArrayHelper::merge(parent::getFilter(), [
            'type' => ['format' => $this->tariffType],
            'client' => ['format' => $this->client],
        ]);
    }
}
