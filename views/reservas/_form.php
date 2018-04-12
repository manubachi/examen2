<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reservas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservas-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'asiento')->dropDownList($asientosLibres) ?>

        <div class="form-group">
            <?= Html::submitButton('Reservar', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
