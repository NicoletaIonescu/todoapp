<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model frontend\models\todomodels\ToDoList */
/* @var $modelItems frontend\models\todomodels\ToDoItem */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'To Do Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="to-do-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php
    $form = ActiveForm::begin();

    foreach ($modelItems as $index => $modelItem) {

        echo $form->field($modelItem, "[$index]name")->textInput(['class' => 'form-control class-content-title_series', 'disabled' => true])->label(false) ;
        echo $form->field($modelItem, "[$index]status")->checkbox()->label(false);
//        echo "<pre>";
//        var_dump($modelItem);
//        echo "</pre>";
    }
    ?>

    <?=Html::submitButton('Changed status', ['class' => 'btn btn-primary', 'name' => 'edit-items-to-do-list-button']) ?>
    <?php ActiveForm::end(); ?>

</div>
