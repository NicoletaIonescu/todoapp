<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <p><a class="btn btn-lg btn-success" href="<?= Url::to(['list/add']);; ?>">Add List</a></p>

     Your to do list:

    <div class="list-group">
        <?php foreach ($lists as $list) {?>
            <a href="#" class="list-group-item list-group-item-action"><?= $list->name ?></a>
        <?php  } ?>
    </div>


    </div>
</div>
