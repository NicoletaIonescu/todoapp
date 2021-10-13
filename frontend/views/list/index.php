<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Lists';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => Url::to(['list/index'])];

?>
<div class="site-index">

    <div class="container-fluid"><a class="btn btn-success form-control" href="<?= Url::to(['list/add']); ?>">Add List</a></p></div>

    <ul class="list-group">
    <?php foreach ($lists as $list) {?>
            <li class="list-group-item">

                <div class="float-right">
                    <a class="btn btn-success" href="<?= Url::toRoute(['list/show', 'list_id' => $list->getId()]); ?>">Show</a>
                    <a class="btn btn-warning" href="<?= Url::toRoute(['list/edit', 'list_id' => $list->getId()]); ?>">Edit</a>
                    <a class="btn btn-danger" href="<?= Url::toRoute(['list/delete', 'list_id' => $list->getId()]) ?>">Delete</a>
                </div>

                <div class="float-left">
                    <span><?= $list->name ?></span>
                </div>
            </li>
    <?php  } ?>
    </ul>




</div>
