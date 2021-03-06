<?php
/**
 * Finance module for HiPanel
 *
 * @link      https://github.com/hiqdev/hipanel-module-finance
 * @package   hipanel-module-finance
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

namespace hipanel\modules\finance\cart;

use yii\base\Exception;

/**
 * Exception represents an pending state of position occurred during cart purchase.
 */
class PendingPurchaseException extends Exception implements PositionFinishExceptionInterface
{
    /**
     * @var AbstractPurchase
     */
    public $purchase;

    /**
     * @var AbstractCartPosition
     */
    public $position;

    /**
     * PendingPurchaseException constructor.
     *
     * @param string $message
     * @param AbstractPurchase $purchase
     * @param Exception $previous
     */
    public function __construct($message, $purchase, Exception $previous = null)
    {
        $this->purchase = $purchase;
        $this->position = $purchase->position;

        parent::__construct($message, 0, $previous);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Item "' . $this->position->getName() . '"" is pending for additional actions';
    }
}
