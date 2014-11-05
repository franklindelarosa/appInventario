<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contactos */

$this->title = 'Update Contactos: ' . ' ' . $model->;
$this->params['breadcrumbs'][] = ['label' => 'Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->, 'url' => ['view', 'id' => $model->id_contacto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contactos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>