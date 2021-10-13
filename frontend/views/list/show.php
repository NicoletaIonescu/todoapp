<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$this->title = 'Show To Do List';

$this->title = "Show List $list->name";
$this->params['breadcrumbs'][] = ['label' => 'Lists', 'url' => Url::to(['list/index'])];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => Url::toRoute(['list/show', 'list_id' => $list->id])];
?>
<div class="container">
    <h1><?= $list->name ?></h1>

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
