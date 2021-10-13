<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$this->title = 'Show To Do List';
?>
<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="container-fluid"><?= $list->name ?></div>

    <div class="container-fluid">

        <ul class="list-group">
            <?php foreach ($modelList as $key=>$model) {?>
                <li class="list-group-item">

                    <div class="float-right">
                        <?php $form = ActiveForm::begin(['action' => ['list/save/'], 'id' => "form_$key", 'method' => 'post']); ?>
                            <?= $form->field($model, "[$key]status")->checkBox(); ?>
                            <?= $form->field($model, "[$key]name")->hiddenInput()->label(false); ?>
                            <?= $form->field($model, "[$key]id")->hiddenInput()->label(false); ?>
                            <?= Html::submitButton('Apply changes', ['class' => 'btn btn-primary', 'name' => 'show-to-do-list-button']) ?>
                        <?php ActiveForm::end(); ?>
                    </div>

                    <div class="float-left">
                        <span><?= $model->name ?></span>
                    </div>
                </li>
            <?php  } ?>
        </ul>


    </div>
</div>
