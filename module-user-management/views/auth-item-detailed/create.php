<?php

use webvimark\modules\UserManagement\UserManagementModule;

use yii\helpers\Html;
use p2made\helpers\FA;
use yii\data\ActiveDataProvider;

//p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
//p2made\assets\DataTablesBundleAsset::register($this);

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
