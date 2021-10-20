<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ToDoListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $pageSize  */

$this->title = 'To Do Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="to-do-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create To Do List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<!--    --><?php //echo $this->render('_search', ['model' => $searchModel, 'pageSize' => $pageSize]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
        'showFooter'=> false,
        'showHeader' => false,
        'pager' => [
            'class' => yii\widgets\LinkPager::className(),
            ]
        /*'tableOptions' => ['class' => 'table tblSec'],*/
    ]); ?>


</div>
