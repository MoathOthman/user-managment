<?php

namespace webvimark\modules\UserManagement\controllers;

use webvimark\components\AdminDefaultController;
use Yii;
use webvimark\modules\UserManagement\models\User;
use webvimark\modules\UserManagement\models\UserPassHistory;
use webvimark\modules\UserManagement\models\search\UserSearch;
use yii\web\NotFoundHttpException;


/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends AdminDefaultController
{
	/**
	 * @var User
	 */
	public $modelClass = 'webvimark\modules\UserManagement\models\User';

	/**
	 * @var UserSearch
	 */
	public $modelSearchClass = 'webvimark\modules\UserManagement\models\search\UserSearch';

	/**
	 * @return mixed|string|\yii\web\Response
	 */
       
	public function actionCreate()
	{
		$model = new User(['scenario'=>'newUser']);

		if ( $model->load(Yii::$app->request->post()) && $model->save() )
		{
                        Yii::$app->db->createCommand()
				->insert(Yii::$app->getModule('user-management')->user_pass_history_table, [
					'user_id' => $model->id,
					//'password_hash' => $this->password,
                                        'password_hash' => $model->password_hash,
					'created_at' => time(),
				])->execute();
                        
			return $this->redirect(['view',	'id' => $model->id]);
		}

		return $this->renderIsAjax('create', compact('model'));
	}

	/**
	 * @param int $id User ID
	 *
	 * @throws \yii\web\NotFoundHttpException
	 * @return string
	 */
	public function actionChangePassword($id)
	{
		$model = User::findOne($id);

		if ( !$model )
		{
			throw new NotFoundHttpException('User not found');
		}

		$model->scenario = 'changePassword';
                if($model->load(Yii::$app->request->post()))
                {
                $check_history =    UserPassHistory::find()
                ->where(['user_id' => $id])
                ->orderBy([
                       //'usertype'=>SORT_ASC,
                       'id' => SORT_DESC,
                        ])
                ->limit(Yii::$app->getModule('user-management')->passwordConfig['passwordHistory'])
                ->all();
                $pass = ($_POST['User']['password']);  
                //print_r($check_history);
                //echo "<hr/>";
                        //$current_password = Yii::$app->security->validatePassword($this->password);
                for($a=0; $a<count($check_history); $a++)
                {

                    if ( Yii::$app->security->validatePassword($pass, $check_history[$a]->password_hash) )
                        {
                                  $model->addError('password', 'You have used the password before. Find another password.');

                                return $this->renderIsAjax('changePassword', compact('model'));
                        }
                }


		if ( $model->save() )
		{
                        Yii::$app->db->createCommand()
				->insert(Yii::$app->getModule('user-management')->user_pass_history_table, [
					'user_id' => $model->id,
					//'password_hash' => $this->password,
                                        'password_hash' => $model->password_hash,
					'created_at' => time(),
				])->execute();
                        
			return $this->redirect(['view',	'id' => $model->id]);
		}
                }
		return $this->renderIsAjax('changePassword', compact('model'));
	}

}
