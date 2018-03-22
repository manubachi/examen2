<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Aeropuertos */

$this->title = $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Aeropuertos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$js = <<<EOT
$('#borrar').click(function (event) {
    event.preventDefault();
    alert('hola');
});
EOT;
$this->registerJs($js);
?>
<div class="aeropuertos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'id' => 'borrar',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'codigo',
            'denominacion',
        ],
    ]) ?>

</div>