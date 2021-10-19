<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ToDoListSearch */
/* @var $form yii\widgets\ActiveForm */
/* @var $pageSize */
?>

<div class="to-do-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="form-group">
        <?= $form->field($model, 'name') ?>

        <?= Html::label('Page Size', ['class' => 'control-label']) ?>


        <?= Html::dropDownList('pageSize', $pageSize,
            [0 => 'ALL', 1 => '1', 2 => '2', 5 => '5', 10 => '10' ],
            ['class' => 'form-control']);
        ?>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
