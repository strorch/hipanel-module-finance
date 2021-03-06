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

use hipanel\modules\finance\logic\Calculator;
use hipanel\modules\finance\models\Calculation;
use hipanel\modules\finance\models\Value;
use hiqdev\yii2\cart\ShoppingCart;
use Yii;
use yz\shoppingcart\CartActionEvent;

/**
 * Class CartCalculator provides API to calculate [[cart]] positions value.
 *
 * Usage:
 *
 * ```php
 * $calculator = new CartCalculator([
 *     'cart' => $this->cart
 * ]);
 *
 * $calculator->run(); // will calculate prices for all cart positions and update them
 * ```
 *
 * Also can be bound to some cart event as handler:
 *
 * ```php
 * $cart->on(Cart::EVENT_UPDATE, [CartCalculator::class, 'handle']);
 * ```
 */
class CartCalculator extends Calculator
{
    /**
     * @var AbstractCartPosition[]
     */
    protected $models;

    /**
     * @var ShoppingCart
     */
    public $cart;

    /**
     * @var CartActionEvent
     */
    public $event;

    /**
     * Creates the instance of the object and runs the calculation.
     *
     * @param CartActionEvent $event The event
     * @void
     */
    public static function handle($event)
    {
        /** @var ShoppingCart $cart */
        $cart = $event->sender;

        $calculator = new static($cart);
        return $calculator->execute();
    }

    /**
     * @param ShoppingCart $cart
     */
    public function __construct(ShoppingCart $cart)
    {
        $this->cart = $cart;

        parent::__construct($this->cart->positions);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        parent::execute();

        $this->applyCalculations();

        return $this->calculations;
    }

    /**
     * Updates positions using the calculations provided with [[getCalculation]].
     */
    private function applyCalculations()
    {
        $currency = Yii::$app->params['currency'];

        foreach ($this->models as $position) {
            $id = $position->id;

            $calculation = $this->getCalculation($id);
            if (!$calculation instanceof Calculation) {
                Yii::error('Cart position "' . $position->getName() . '" was removed from the cart because of failed value calculation. Normally this should never happen.', 'hipanel.cart');
                $this->cart->removeById($position->id);
                break;
            }

            $value = $calculation->forCurrency($currency);
            if (!$value instanceof Value) {
                Yii::error('Cart position "' . $position->getName() . '" was removed from the cart because calculation for currency "' . $currency . '" is not available', 'hipanel.cart');
                $this->cart->removeById($position->id);
                break;
            }

            $position->setPrice($value->price);
            $position->setValue($value->value);
        }
    }
}
