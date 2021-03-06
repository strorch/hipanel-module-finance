<?php
/**
 * Finance module for HiPanel
 *
 * @link      https://github.com/hiqdev/hipanel-module-finance
 * @package   hipanel-module-finance
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

namespace hipanel\modules\finance\models\decorators;

abstract class AbstractResourceDecorator implements ResourceDecoratorInterface
{
    /**
     * @var resource
     */
    protected $resource;

    public function __construct($resource)
    {
        $this->resource = $resource;
    }
}
