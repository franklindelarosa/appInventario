<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HistoricosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="historicos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_historico') ?>

    <?= $form->field($model, 'usuario') ?>

    <?= $form->field($model, 'tabla') ?>

    <?= $form->field($model, 'elementos') ?>

    <?= $form->field($model, 'accion') ?>

    <?php // echo $form->field($model, 'fecha_hora') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
