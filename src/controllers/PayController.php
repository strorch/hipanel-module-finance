<?php
/**
 * Finance module for HiPanel
 *
 * @link      https://github.com/hiqdev/hipanel-module-finance
 * @package   hipanel-module-finance
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

namespace hipanel\modules\finance\controllers;

use hipanel\modules\finance\models\Merchant;
use hiqdev\hiart\ResponseErrorException;
use hiqdev\yii2\merchant\transactions\Transaction;
use Yii;

/**
 * Class PayController.
 * @property \hipanel\modules\finance\Module $module
 */
class PayController extends \hiqdev\yii2\merchant\controllers\PayController
{
    public function getMerchantModule()
    {
        return $this->module->getMerchant();
    }

    public function render($view, $params = [])
    {
        return $this->getMerchantModule()->getPayController()->render($view, $params);
    }

    public function checkNotify()
    {
        $id = Yii::$app->request->get('transactionId') ?: Yii::$app->request->post('transactionId');
        $transaction = $this->getMerchantModule()->findTransaction($id);
        $data = array_merge([
            'transactionId' => $transaction->getId(),
            'username'      => $transaction->getParameter('username'),
            'merchant'      => $transaction->getParameter('merchant'),
        ], $_REQUEST);
        Yii::info(http_build_query($data), 'merchant');

        try {
            Yii::$app->get('hiart')->disableAuth();
            $result = Merchant::perform('pay', $data);

            return $this->completeTransaction($transaction, $result);
        } catch (ResponseErrorException $e) {
            return false;
        } finally {
            Yii::$app->get('hiart')->enableAuth();
        }
    }

    /**
     * @param Transaction $transaction
     * @param $response
     * @return mixed
     */
    protected function completeTransaction($transaction, $response)
    {
        if ($transaction->isCompleted()) {
            return $transaction;
        }

        $transaction->confirm();
        $transaction->addParameter('bill_id', $response['id']);

        return $transaction;
    }
}
