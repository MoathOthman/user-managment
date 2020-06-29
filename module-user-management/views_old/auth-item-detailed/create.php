<?php

use webvimark\modules\UserManagement\UserManagementModule;

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AuthItemDetailed */

$this->title = 'Create Auth Item Detailed';
$this->params['breadcrumbs'][] = ['label' => 'Auth Item Detaileds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-detailed-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
