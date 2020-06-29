<?php

namespace webvimark\modules\UserManagement\models;

use Ikimea\Browser\Browser;
use webvimark\helpers\LittleBigHelper;
use webvimark\modules\UserManagement\UserManagementModule;
use Yii;
use sammaye\audittrail\AuditTrail;
use sammaye\audittrail\LoggableBehavior;
/**
 * This is the model class for table "user_visit_log".
 *
 * @property integer $id
 * @property string $token
 * @property string $ip
 * @property string $language
 * @property string $browser
 * @property string $os
 * @property string $user_agent
 * @property integer $user_id
 * @property integer $visit_time
 * @property integer $visit_status
 *
 * @property User $user
 */
class UserVisitLog extends \webvimark\components\BaseActiveRecord
{       
	CONST SESSION_TOKEN = '__visitorToken';

	/**
	 * Save new record in DB and write unique token in session
	 *
	 * @param int $userId
	 */
        
        public function behaviors() {
      if ( Yii::$app->getModule('user-management')->auditTrail)
            {
                return [
                    'sammaye\audittrail\LoggableBehavior',
                ];
            }
            else
            {
                return [
               
                ];
            }
  }
	public static function newVisitor($userId)
	{
		$browser = new Browser();

		$model             = new self();
		$model->user_id    = $userId;
		$model->token      = uniqid();
		$model->ip         = LittleBigHelper::getRealIp();
		$model->language   = isset( $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) ? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) : '';
		$model->browser    = $browser->getBrowser();
		$model->os         = $browser->getPlatform();
		$model->user_agent = $browser->getUserAgent();
		$model->visit_time = time();
                $model->visit_status = 1;
		$model->save(false);

		Yii::$app->session->set(self::SESSION_TOKEN, $model->token);
	}

	/**
	 * Checks if token stored in session is equal to token from this user last visit
	 * Logout if not
	 */
        public static function logout($id)
        {
            //$id = Yii::$app->user->id;
               // $UserVisitLog = new UserVisitLog();
                $browser = new Browser();
                 $condition = ['and',
                           ['=','ip',LittleBigHelper::getRealIp()],
                         ['=','browser' , $browser->getBrowser()],
                         ['=','os'        , $browser->getPlatform()],
                         ['=','user_agent' ,$browser->getUserAgent()],
                         ['=','user_id' , Yii::$app->user->id]];
                            UserVisitLog::updateAll(['visit_status' => 2], $condition);
            //in
                return true;
        }
	public static function checkToken()
	{
		if (Yii::$app->user->isGuest)
			return;

		$model = static::find()
			->andWhere(['user_id'=>Yii::$app->user->id])
			->orderBy('id DESC')
			->asArray()
			->one();

		if ( !$model OR ($model['token'] !== Yii::$app->session->get(self::SESSION_TOKEN)) )
		{
			Yii::$app->user->logout();

			echo "<script> location.reload();</script>";
			Yii::$app->end();
		}
	}
        public static function isInactive()
        {
            $browser = new Browser();
            //$visitLog = array('dfas');
            $query = new \yii\db\Query;
            $query->select('*')->from(UserVisitLog::tableName())
            ;
            //->limit($Limit);
        //  $query->asArray();
         $command = $query->createCommand();
       
        $visitLog = $command->queryAll();
        
            if(count($visitLog)>0)
            {
                return false;
            }
            else return true;
        }
        
        public static function LoginStatusValidation()
        {
            if(!empty(Yii::$app->user->id))
                {
                    $ip = getenv('HTTP_CLIENT_IP')?:
                    getenv('HTTP_X_FORWARDED_FOR')?:
                    getenv('HTTP_X_FORWARDED')?:
                    getenv('HTTP_FORWARDED_FOR')?:
                    getenv('HTTP_FORWARDED')?:
                    getenv('REMOTE_ADDR');
                    
                    $ExactBrowserNameUA=$_SERVER['HTTP_USER_AGENT'];

                if (strpos(strtolower($ExactBrowserNameUA), "safari/") and strpos(strtolower($ExactBrowserNameUA), "opr/")) {
                    // OPERA
                    $ExactBrowserNameBR="Opera";
                } elseIf (strpos(strtolower($ExactBrowserNameUA), "safari/") and strpos(strtolower($ExactBrowserNameUA), "chrome/")) {
                    // CHROME
                    $ExactBrowserNameBR="Chrome";
                } elseIf (strpos(strtolower($ExactBrowserNameUA), "msie")) {
                    // INTERNET EXPLORER
                    $ExactBrowserNameBR="Internet Explorer";
                } elseIf (strpos(strtolower($ExactBrowserNameUA), "firefox/")) {
                    // FIREFOX
                    $ExactBrowserNameBR="Firefox";
                } elseIf (strpos(strtolower($ExactBrowserNameUA), "safari/") and strpos(strtolower($ExactBrowserNameUA), "opr/")==false and strpos(strtolower($ExactBrowserNameUA), "chrome/")==false) {
                    // SAFARI
                    $ExactBrowserNameBR="Safari";
                } else {
                    // OUT OF DATA
                    $ExactBrowserNameBR="OUT OF DATA";
                };

                $visitLog = UserVisitLog::find()
                        ->where(['user_id' => Yii::$app->user->id,'ip'=>$ip,
                            'browser'=>$ExactBrowserNameBR, 
                            'visit_status'=>'1'])
                        ->asArray()
                        ->all();
                //print_r($ExactBrowserNameBR);exit;
               if(count($visitLog)<=0)
               {
                Yii::$app->response->redirect(Yii::$app->urlManager->createAbsoluteUrl('user-management/auth/logout'));
                }
                }
        }

        /**
	* @inheritdoc
	*/
	public static function tableName()
	{
		return Yii::$app->getModule('user-management')->user_visit_log_table;
	}

	/**
	* @inheritdoc
	*/
	public function rules()
	{
		return [
			[['token', 'ip', 'language', 'visit_time'], 'required'],
			[['user_id', 'visit_time'], 'integer'],
			[['token', 'user_agent'], 'string', 'max' => 255],
			[['ip'], 'string', 'max' => 15],
			[['os'], 'string', 'max' => 20],
			[['browser'], 'string', 'max' => 30],
			[['language'], 'string', 'max' => 2]
		];
	}

	/**
	* @inheritdoc
	*/
	public function attributeLabels()
	{
		return [
			'id'         => UserManagementModule::t('back', 'ID'),
			'token'      => UserManagementModule::t('back', 'Token'),
			'ip'         => UserManagementModule::t('back', 'IP'),
			'language'   => UserManagementModule::t('back', 'Language'),
			'browser'    => UserManagementModule::t('back', 'Browser'),
			'os'         => UserManagementModule::t('back', 'OS'),
			'user_agent' => UserManagementModule::t('back', 'User agent'),
			'user_id'    => UserManagementModule::t('back', 'User'),
			'visit_time' => UserManagementModule::t('back', 'Visit Time'),
		];
	}

	/**
	* @return \yii\db\ActiveQuery
	*/
	public function getUser()
	{
		return $this->hasOne(User::className(), ['id' => 'user_id']);
	}
        
        public static function saveDetailtoSession()
        {
            $session = Yii::$app->session;
           
            	$userdetail = $session->get('userdetail');
                if(empty($userdetail))
                {
                	$userid = Yii::$app->user->id;
                    if(!empty($userid))
                    {
                        
                        $checkUser = \app\models\User::find()->where('id=:id',['id'=>$userid])->asArray()->one();
                        $userDetail = \app\models\UserDetail::find()->where('id=:userid',['userid'=>$checkUser['id']])->asArray()->one();
                        $roles = \app\models\AuthAssignment::find()->where('user_id =:userid',['userid'=>$checkUser['id']])->asArray()->one();
                        
                        $session->set('user_access', $checkUser);
                        $session->set('user_roles', $roles);
                        $session->set('user_detail', $userDetail);
                    }
                }
                return true;
        }
}
