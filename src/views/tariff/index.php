<?php

use hipanel\modules\finance\grid\TariffGridView;
use hipanel\widgets\ActionBox;

$this->title                   = Yii::t('app', 'Tariffs');
$this->params['subtitle']      = array_filter(Yii::$app->request->get($model->formName(), [])) ? 'filtered list' : 'full list';
$this->params['breadcrumbs'][] = $this->title;

?>

<?php $box = ActionBox::begin(['model' => $model, 'dataProvider' => $dataProvider, 'options' => ['class' => 'box-info']]) ?>
    <?php $box->beginActions() ?>
    <div class="dropdown">
        <?php if (Yii::$app->user->can('manage')) : ?>
            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <?= Yii::t('app', 'Create tariff'); ?>&nbsp;
                <span class="caret"></span>
            </button>
        <?php endif; ?>
        <?= $box->renderSearchButton(); ?>
        <?= $box->renderSorter([
            'attributes' => [
                'seller',
                'client',
                'tariff',
            ],
        ]) ?>
        <?= $box->renderPerPage() ?>
        <?php if (Yii::$app->user->can('manage')) : ?>
            <?= \yii\bootstrap\Dropdown::widget([
                'items' => [
                    ['label' => Yii::t('app', 'Create tariff for domain(s)'), 'url' => '#'],
                    ['label' => Yii::t('app', 'Create svds tariff'), 'url' => '#'],
                    ['label' => Yii::t('app', 'Create ovds tariff'), 'url' => '#'],
                    ['label' => Yii::t('app', 'Create server tariff'), 'url' => '#'],
                    ['label' => Yii::t('app', 'Create resources tariff'), 'url' => '#'],
                ]
            ]) . '&nbsp;'; ?>
        <?php endif; ?>
    </div>
    <?php $box->endActions() ?>
    <?php if (Yii::$app->user->can('manage')) : ?>
        <?= $box->renderBulkActions([
                'items' => [
                    $box->renderDeleteButton(Yii::t('app', 'Delete')),
                ],
            ]); ?>
        <?php endif; ?>
    <?= $box->renderSearchForm(compact('paymentType')) ?>

<?php $box->end() ?>
    <?php $box->beginBulkForm() ?>
        <?= tariffGridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $model,
            'columns'      => Yii::$app->user->can('manage')
                ? [
                    'checkbox',
                    'tariff', 'note', 'used',
                    'client_id', 'seller_id',
                ]
                : [
                    'tariff', 'note', 'used',
                    'client_id', 'seller_id',
                ],
        ]) ?>
    <?php $box->endBulkForm(); ?>