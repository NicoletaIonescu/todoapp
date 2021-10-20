<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'To Do App';
$this->params['breadcrumbs'][] = ['label'=>''];
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <?php if (Yii::$app->user->isGuest) { ?>

            <p><a class="btn btn-lg btn-success" href="<?= Url::toRoute(['site/login']); ?>">Get started and Login! </a></p>

        <?php } else { ?>

            <p><a class="btn btn-lg btn-success" href="<?= Url::toRoute(['to-do-list/index']); ?>">Create Lists! </a></p>

        <?php } ?>
    </div>

    <div class="body-content">



    </div>
</div>
