<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SupplierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Suppliers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Supplier', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'summary' => Html::a('导出全部', ['export'] + $_REQUEST, ['class' => 'btn btn-success']),
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                    //'class' => 'yii\grid\SerialColumn'
                    'class' => 'yii\grid\CheckboxColumn'
            ],
            'id',
            'name',
            'code',
            //'t_status',
            [
                'attribute' => 't_status',
                'filter' => ['ok' => 'ok', 'hold' => 'hold']
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, common\models\Supplier $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
