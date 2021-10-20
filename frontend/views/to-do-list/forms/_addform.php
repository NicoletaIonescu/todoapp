<?php

use unclead\multipleinput\MultipleInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ToDoListForm */
/* @var $form yii\widgets\ActiveForm */
/* @var $user_id */

?>


    <?php $form = ActiveForm::begin(['id' => 'form-add-to-do-list']); ?>
    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'user_id')->hiddenInput(['value'=> $user_id])->label(false); ?>
    <?= $form->field($model, 'items')->widget(MultipleInput::className(), [
        'max' => 5,
        'addButtonOptions' => [
            'class' => 'btn btn-success',
            'label' => 'add' // also you can use html code
        ],
        'removeButtonOptions' => [
            'label' => 'remove'
        ],
        'allowEmptyList' => true,
        'enableGuessTitle' => true
    ])->label(false);
    ?>
<?= Html::submitButton('Add', ['class' => 'btn btn-primary', 'name' => 'add-to-do-list-button']) ?>
<?php ActiveForm::end(); ?>