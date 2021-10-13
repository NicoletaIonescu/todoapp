<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = ucfirst($user->identity->username);
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => Url::to(['user/index'])];

?>
<div class="site-index">
   <pre>
     <?php var_dump($user->identity->username) ?>
   </pre>

    <pre>
     <?php var_dump($user->identity->email) ?>
   </pre>
</div>
