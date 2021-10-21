<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\todomodels\ToDoListSearch */
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

            'name',
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:20%;'],
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url) {
                        return Html::a(
                            "Show",
                            $url,
                            [
                                'title' => 'Show',
                                'data-pjax' => '0',
                                'class' => 'btn btn-success'
                            ]
                        );
                    },
                    'update' => function ($url) {
                        return Html::a(
                            "Edit",
                            $url,
                            [
                                'title' => 'Edit',
                                'data-pjax' => '0',
                                'class' => 'btn btn-warning'
                            ]
                        );
                    },
                    'delete' => function ($url) {
                        return   Html::beginForm([$url], 'post', ['class' =>'d-inline'])
                                .Html::submitButton('Delete', ['class' => 'btn btn-danger'])
                                .Html::endForm()
                       ;
                    },
                ],
            ],

        ],
        'showFooter'=> false,
        'showHeader' => false,
        'pager' => [
                'class'=> \yii\bootstrap4\LinkPager::class ,
                'firstPageLabel' => 'first',
                'lastPageLabel' => 'last',
                'prevPageLabel' => '<',
                'nextPageLabel' => '>',
                'maxButtonCount' => 2,
        ],
        'tableOptions' => ['class' => 'table ']
    ]); ?>


</div>
