<?php

use webvimark\modules\UserManagement\UserManagementModule;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manage Route Labels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-detailed-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?// Html::a('Create Auth Item Detailed', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            //'type',
            'description:ntext',
            //'rule_name',
            //'data:ntext',
            // 'created_at',
            // 'updated_at',
            // 'group_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
