<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card m-2">
    <div class="card-header">
        <h3 class="float-left ">Categoris</h3>
        <p>
            <?= Html::a('Create Categories', ['create'], ['class' => 'btn btn-success btn-sm float-right']) ?>
        </p>
    </div>
    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [

                'id',
                'name',

                ['class' => 'backend\components\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
