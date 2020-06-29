<?php

use webvimark\modules\UserManagement\UserManagementModule;
use p2made\helpers\FA;
use yii\data\ActiveDataProvider;

//p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
//p2made\assets\DataTablesBundleAsset::register($this);
/**
 * @var yii\web\View $this
 */

$this->title = UserManagementModule::t('front', 'Password recovery');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="password-recovery-success">

	<div class="alert alert-success text-center">
		<?= UserManagementModule::t('front', 'Check your E-mail for further instructions') ?>
	</div>

</div>
