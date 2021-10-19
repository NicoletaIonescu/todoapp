<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ToDoList */

$this->title = 'Create To Do List';
$this->params['breadcrumbs'][] = ['label' => 'To Do Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="to-do-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
