<?php

use hipanel\modules\finance\grid\PlanGridView;
use hipanel\widgets\IndexPage;
use hipanel\widgets\Pjax;
use yii\helpers\Html;

$this->title = Yii::t('hipanel:finance', 'Tariff plans');
$this->params['breadcrumbs'][] = $this->title;

?>

<?php Pjax::begin(array_merge(Yii::$app->params['pjax'], ['enablePushState' => true])) ?>
    <?php $page = IndexPage::begin(compact('model', 'dataProvider')) ?>

        <?php $page->setSearchFormData([]) ?>

        <?php $page->beginContent('main-actions') ?>
            <?php if (Yii::$app->user->can('plan.create')) : ?>
                <?= Html::a(Yii::t('hipanel', 'Create'), ['/finance/plan/create'], ['class' => 'btn btn-sm btn-success']) ?>
            <?php endif ?>
        <?php $page->endContent() ?>

        <?php $page->beginContent('sorter-actions') ?>
            <?= $page->renderSorter(['attributes' => ['id']]) ?>
        <?php $page->endContent() ?>

        <?php $page->beginContent('bulk-actions') ?>
            <?php if (Yii::$app->user->can('plan.create')) : ?>
                <?= $page->renderBulkButton('@plan/restore', Yii::t('hipanel.finance.plan', 'Restore')) ?>
            <?php endif ?>
            <?php if (Yii::$app->user->can('plan.update')) : ?>
                <?= $page->renderBulkDeleteButton('@plan/delete') ?>
            <?php endif ?>
        <?php $page->endContent() ?>

        <?php $page->beginContent('table') ?>
            <?php $page->beginBulkForm() ?>
                <?= PlanGridView::widget([
                    'boxed' => false,
                    'dataProvider' => $dataProvider,
                    'filterModel' => $model,
                    'columns' => [
                        'checkbox',
                        'actions',
                        'name',
                        'client',
                        'type',
                        'state',
                    ],
                ]) ?>
            <?php $page->endBulkForm() ?>
        <?php $page->endContent() ?>
    <?php $page->end() ?>
<?php Pjax::end() ?>
