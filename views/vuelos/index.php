<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VuelosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vuelos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vuelos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Vuelos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'codigo',
            'origen.codigo:text:Origen',
            'destino.codigo:text:Destino',
            'compania.denominacion:text:Compañia',
            'salida:datetime',
            'llegada:datetime',
            'plazas',
            'precio:currency',
            'plazas_libres',
            // Forma de saber las plazas libres de modo rápido, se aconseja hacerlo en el modelo.
            /*[
                'attribute' => 'libres',
                'value' => function ($model, $key, $index, $column) {
                    return $model->plazas - count($model->reservas);
                }
            ],*/

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{reservar}', //botones en el template entre llaves
                'buttons' => [ // Aqui se indica lo que hace cada boton
                    'reservar' => function ($url, $model, $key){
                        return Html::a('Reservar',[
                                'reservas/create',
                                'vuelo_id' => $model->id
                        ], ['class' =>'btn-sm btn-success']);
                    },

                ],
            ],
        ],
    ]); ?>
</div>
