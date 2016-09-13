<?php

use hipanel\modules\finance\widgets\PriceDifferenceWidget;
use hipanel\widgets\Box;

/**
 * @var $this \yii\web\View
 * @var $model \hipanel\modules\finance\forms\SvdsTariffForm
 */
?>
<div class="row">
    <div class="col-md-12">
        <?php Box::begin(['title' => Yii::t('hipanel/finance/tariff', 'Hardware')]) ?>
        <table class="table table-condensed">
            <thead>
            <tr>
                <th><?= Yii::t('hipanel/finance/tariff', 'Resource') ?></th>
                <th><?= Yii::t('hipanel/finance/tariff', 'Model') ?></th>
                <th><?= Yii::t('hipanel/finance/tariff', 'Price per period') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($model->getHardwareResources() as $resource) {
            $baseResource = $model->getBaseHardwareResource($resource->object_id); ?>
            <tr>
                <td><?= $resource->decorator()->displayTitle() ?></td>
                <td><?= $resource->decorator()->displayPrepaidAmount() ?></td>
                <td>
                    <?= Yii::$app->formatter->asCurrency($resource->fee, $resource->currency) ?>
                    <?= PriceDifferenceWidget::widget([
                        'new' => $resource->fee,
                        'old' => $baseResource->fee,
                    ]) ?>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php Box::end() ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php Box::begin(['title' => Yii::t('hipanel/finance/tariff', 'Resources')]) ?>
        <table class="table table-condensed">
            <thead>
            <tr>
                <th><?= Yii::t('hipanel/finance/tariff', 'Resource') ?></th>
                <th><?= Yii::t('hipanel/finance/tariff', 'Price per period') ?></th>
                <th><?= Yii::t('hipanel/finance/tariff', 'Prepaid amount') ?></th>
                <th><?= Yii::t('hipanel/finance/tariff', 'Overuse price') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($model->getOveruseResources() as $resource) {
                $baseResource = $model->getBaseOveruseResource($resource->type_id); ?>
                <tr>
                    <td><?= $resource->decorator()->displayTitle() ?></td>
                    <td>
                        <?= Yii::$app->formatter->asCurrency($resource->fee, $resource->currency) ?>

                        <?= PriceDifferenceWidget::widget([
                            'new' => $resource->fee,
                            'old' => $baseResource->fee,
                        ]) ?>
                    </td>
                    <td>
                        <?= $resource->decorator()->displayPrepaidAmount() ?>
                    </td>
                    <td>
                        <?= Yii::$app->formatter->asCurrency($resource->price, $resource->currency) ?>

                        <?= PriceDifferenceWidget::widget([
                            'new' => $resource->price,
                            'old' => $baseResource->price,
                        ]) ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php Box::end() ?>
    </div>
</div>