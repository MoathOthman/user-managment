<?php

namespace webvimark\modules\UserManagement\components;

use yii\web\User;
use yii\helpers\Url;
use Yii;

/**
 * Class UserConfig
 * @package webvimark\modules\UserManagement\components
 */
class UserConfig extends User
{
	/**
	 * @inheritdoc
	 */
	public $identityClass = 'webvimark\modules\UserManagement\models\User';

	/**
	 * @inheritdoc
	 */
	public $enableAutoLogin = true;
	
	/**
 	 * @inheritdoc
	 */
	public $cookieLifetime = 2592000;
  
	/**
	 * @inheritdoc
	 */
	public $loginUrl = ['/user-management/auth/login'];

	/**
	 * Allows to call Yii::$app->user->isSuperadmin
	 *
	 * @return bool
	 */
	public function __construct()
	{
		
		//print_r($_SESSION);exit;
		/*
if (!Yii::$app->session->isActive) {
		    Yii::$app->session->open();
		}

		$sess = Yii::$app->session;
		print_r($_GET);
		 var_dump(Yii::$app->request->referrer);exit;
*/
                /*
		if(isset($_GET['type']))
		{
			if(!empty($_GET['type']))
			{
				$access_type = $_GET['type'];
				$this->loginUrl = ['/user-management/auth/login?type='.$access_type];	
			}
			else
			$this->loginUrl = Url::base(true).'/sites/index.html';	
		}
		else
		{
			$this->loginUrl = Url::base(true).'/sites/index.html';	
		}
                 * 
                 */
		
	}
	public function getIsSuperadmin()
	{
		return @Yii::$app->user->identity->superadmin == 1;
	}

	/**
	 * @return string
	 */
	public function getUsername()
	{
		return @Yii::$app->user->identity->username;
	}

	/**
	 * @inheritdoc
	 */
	protected function afterLogin($identity, $cookieBased, $duration)
	{
		AuthHelper::updatePermissions($identity);

		parent::afterLogin($identity, $cookieBased, $duration);
	}

}
