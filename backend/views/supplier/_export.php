<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Supplier */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supplier-form">

    <?php $form = ActiveForm::begin(); ?>


    <?php
    $attrs = $searchModel->attributeLabels();
    echo Html::checkboxList('fields',array_keys($attrs), $attrs,  ['item' =>
        function ($index, $label, $name, $checked, $value) {
        //var_dump(func_get_args());exit;
        $itemOptions = [];
        if ('id' == $value) {
            $itemOptions['onclick'] = 'return false';
        }
        return Html::checkbox($name, $checked, array_merge([
            'value' => $value,
            'label' => HTML::encode($label),
        ], $itemOptions));
    }]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
