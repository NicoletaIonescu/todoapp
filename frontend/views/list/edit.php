<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

use unclead\multipleinput\MultipleInput;

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Edit To Do List';
?>
<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to add list:</p>
    <div class="container-fluid">

        <?php $form = ActiveForm::begin(['id' => 'form-add-to-do-list']); ?>
        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'user_id')->hiddenInput(['value'=> $user_id])->label(false); ?>
        <?= $form->field($model, 'list_id')->hiddenInput(['value'=> $list_id])->label(false); ?>
        <?= $form->field($model, 'items')->widget(MultipleInput::className(), [
            'addButtonOptions' => [
                'class' => 'btn btn-success',
                'label' => 'add' // also you can use html code
            ],
            'removeButtonOptions' => [
                'label' => 'remove'
            ],
            'allowEmptyList' => true,
            'enableGuessTitle' => true,
            'addButtonPosition' => MultipleInput::POS_HEADER, // show add button in the header
        ])->label(false);
        ?>

        <?= Html::submitButton('Edit', ['class' => 'btn btn-primary', 'name' => 'edit-to-do-list-button']) ?>
        <?php ActiveForm::end(); ?>

    </div>
</div>
