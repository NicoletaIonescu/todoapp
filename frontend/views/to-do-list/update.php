<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\todomodels\ToDoListForm */
/* @var $user_id */
/* @var $list_id */


$this->title = 'Update To Do List: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'To Do Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->list_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="to-do-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('forms/_editform', [
        'model' => $model,
        'user_id' => $user_id,
        'list_id' => $list_id
    ]) ?>

</div>
