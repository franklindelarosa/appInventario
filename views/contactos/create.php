<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Contactos */

$this->title = 'Crear Contacto';
$this->params['breadcrumbs'][] = ['label' => 'Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contactos-create">

    <h1><?= Html::encode($this->title) ?></h1><br>
	<?php $data = [] ?>
    <?= $this->render('_form', [
        'model' => $model,
        'data' => $data,
    ]) ?>

</div>
