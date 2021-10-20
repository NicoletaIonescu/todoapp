<?php

use unclead\multipleinput\MultipleInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\todomodels\ToDoListForm */
/* @var $form yii\widgets\ActiveForm */
/* @var $user_id */
/* @var $list_id */

?>


    <?php $form = ActiveForm::begin(['id' => 'form-edit-to-do-list']); ?>
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