<?php

use webvimark\modules\UserManagement\UserManagementModule;
use yii\helpers\Html;
use p2made\helpers\FA;
use yii\data\ActiveDataProvider;

//p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
//p2made\assets\DataTablesBundleAsset::register($this);
/**
 * @var yii\web\View $this
 * @var webvimark\modules\UserManagement\models\rbacDB\AuthItemGroup $model
 */

$this->title = UserManagementModule::t('back', 'Editing permission group') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => UserManagementModule::t('back', 'Permission groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->code]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Editing')
?>
<div class="auth-item-group-update">

	<h2 class="lte-hide-title"><?= $this->title ?></h2>

	<div class="panel panel-default">
		<div class="panel-body">

			<?= $this->render('_form', compact('model')) ?>
		</div>
	</div>

</div>
