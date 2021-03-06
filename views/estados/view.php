<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Estados */

$this->title = $model->estado;
$this->params['breadcrumbs'][] = ['label' => 'Estados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estados-view">

    <h1><?= Html::encode($this->title) ?></h1>
<?php if(Yii::$app->user->can('admin')){?>
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_estado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_estado], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Desea borrar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php } ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id_estado',
            'estado',
            'descripcion',
            // 'borrado',
        ],
    ]) ?>

</div>
