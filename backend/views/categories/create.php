<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\categories\Categories */

$this->title = 'Create Categories';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card m-2">
    <div class="card-header">
        <h3 class="float-left "><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="card-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
