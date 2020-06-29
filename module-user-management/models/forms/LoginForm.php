<?php
namespace webvimark\modules\UserManagement\models\forms;
use Ikimea\Browser\Browser;
use webvimark\helpers\LittleBigHelper;
use webvimark\modules\UserManagement\models\User;
use webvimark\modules\UserManagement\models\UserLoginHistory;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\base\Model;
use Yii;
use sammaye\audittrail\AuditTrail;
use sammaye\audittrail\LoggableBehavior;

class LoginForm extends Model
{
	public $username;
	public $password;
	public $rememberMe = false;

	private $_user = false;

	/**
	 * @inheritdoc
	 */
        public function behaviors()
	{
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
	public function rules()
	{
		return [
			[['username', 'password'], 'required'],
			['rememberMe', 'boolean'],
			['password', 'validatePassword'],

			['username', 'validateIP'],
		];
	}

	public function attributeLabels()
	{
		return [
			'username'   => UserManagementModule::t('front', 'Username'),
			'password'   => UserManagementModule::t('front', 'Password'),
			'rememberMe' => UserManagementModule::t('front', 'Remember me'),
		];
	}

	/**
	 * Validates the password.
	 * This method serves as the inline validation for password.
	 */
	public function validatePassword()
	{
		if ( !Yii::$app->getModule('user-management')->checkAttempts() )
		{
			$this->addError('password', UserManagementModule::t('front', 'You have reach maximum attemps'));

			return false;
		}

		if ( !$this->hasErrors() )
		{
			$user = $this->getUser();
			if ( !$user || !$user->validatePassword($this->password) )
			{
				$this->addError('password', UserManagementModule::t('front', 'Incorrect username or password.'));
			}
		}
	}

	/**
	 * Check if user is binded to IP and compare it with his actual IP
	 */
	public function validateIP()
	{
		$user = $this->getUser();

		if ( $user AND $user->bind_to_ip )
		{
			$ips = explode(',', $user->bind_to_ip);

			$ips = array_map('trim', $ips);

			if ( !in_array(LittleBigHelper::getRealIp(), $ips) )
			{
				$this->addError('password', UserManagementModule::t('front', "Your IP Address has been blocked"));
			}
		}
	}

	/**
	 * Logs in a user using the provided username and password.
	 * @return boolean whether the user is logged in successfully
	 */
	public function login()
	{
               // echo 'est';
                //$now = time();
                $notUsedExpire = Yii::$app->getModule('user-management')->notUsedExpiryDay;
                //print_r($notUsedExpire);exit;
                $user = User::find()->where(['username' => $this->username])->one();
                if($notUsedExpire>0 && $user)
                {
                
                $init_time = time() - 30*24*60*60;
                $loginHistoryBefore = UserLoginHistory::find()
                        ->where(['user_id'=>$user->id])
                        ->andWhere(['<','created_at',$init_time])
                        ->asArray()->all();
                
                $loginHistory = UserLoginHistory::find()
                        ->where(['user_id'=>$user->id])
                        ->andWhere(['>=','created_at',$init_time])
                        ->asArray()->all();
                
/*
	// need to check what it is for. Sep 16 2018 Imam Syafii
                if((count($loginHistory)<1)&&(count($loginHistoryBefore)>0))
                {
                    $command = Yii::$app->db->createCommand();
                    $command->update(Yii::$app->getModule('user-management')->user_table, array(
                        'status'=>'-1',
                    ), 'id=:id', array(':id'=>$user->id));
                    $command->execute();
                    return false;
                }
*/
                
                }
		if ( $this->validate() )
		{
                        $user = $this->getUser();
                       // print_r($user);
                        //exit();
                        $now = time(); // or your date as well
                        
                        $loginHistory = new UserLoginHistory();
                        $loginHistory->user_id = $user->id;
                        $loginHistory->username = $user->username;
                        $loginHistory->password_hash = $user->password_hash;
                        $loginHistory->created_at = time();
                        $loginHistory->is_success = 1;
                        ($loginHistory->save(false));
                        
                        $your_date = !empty($user->lastpass_changed)?($user->lastpass_changed):($user->created_at);
                        $datediff = $now - $your_date;

                        $days =  floor($datediff / 86400);//(60 * 60 * 24));
                        
                        $passwordExpiry = Yii::$app->getModule('user-management')->passwordConfig['passwordExpiryDay'];
                        $bannedOnPasswordExpired = Yii::$app->getModule('user-management')->passwordConfig['bannedOnPasswordExpired'];
                        if($bannedOnPasswordExpired)
                        if($passwordExpiry>0)
                        {
                            if($days>$passwordExpiry)
                            {
                                
                        
                                $command = Yii::$app->db->createCommand();
                                $command->update(Yii::$app->getModule('user-management')->user_table, array(
                                    'status'=>'-1',
                                ), 'id=:id', array(':id'=>$user->id));
                                $command->execute();
                                //echo $now.' -- '.$user->lastpass_changed.'==='.$your_date.'==>'.$days;
                                //echo $passwordExpiry.' '.$user->id;
                                //return true;exit;
                                
                                return false;
                                //redirect to change password
                            }
                        }
                        
			return Yii::$app->user->login($this->getUser(), $this->rememberMe ? Yii::$app->user->cookieLifetime : 0);
		}
		else
		{
                    $user = User::find()->where(['username' => $this->username])->one();
                    //print_r($user);
                    //echo "salah";
                    //exit;
                    
                    $loginHistory = new UserLoginHistory();
                        $loginHistory->user_id = isset($user->id)?$user->id:'';
                        $loginHistory->username = $this->username;
                        $loginHistory->password_hash = Yii::$app->security->generatePasswordHash($this->password);
                        $loginHistory->created_at = time();
                        $loginHistory->is_success = 0;
                        ($loginHistory->save(false));
                    
                     if(isset($user->id))
                     {
                         $limitFailedAttempt =  Yii::$app->getModule('user-management')->passwordConfig['failedAttemptsLimit'];
                         $limitFailedAttempt  = !empty($limitFailedAttempt)?$limitFailedAttempt:3;
                         
                    $FailLogHistory = UserLoginHistory::find()->where(['=','user_id',$user->id])->orderBy("id desc")->limit($limitFailedAttempt)->asArray()->all();
                    $is_banned = 1;
                    foreach ($FailLogHistory as $fl)
                    {
                        if ($fl['is_success']=='1')
                            $is_banned = 0;
                        if ($fl['is_success']=='-1')
                            $is_banned = 0;
                    }
                    
                    //json($FailLogHistory);exit;
                    if($is_banned=='1')
                    {
                         $loginHistory = new UserLoginHistory();
                        $loginHistory->user_id = $user->id;
                        $loginHistory->username = $user->username;
                        $loginHistory->password_hash = Yii::$app->security->generatePasswordHash($this->password);
                        $loginHistory->created_at = time();
                        $loginHistory->is_success = '-1';
                        ($loginHistory->save(false));
                    
                     
                        
                        $command = Yii::$app->db->createCommand();
                                $command->update(Yii::$app->getModule('user-management')->user_table, array(
                                    'status'=>'-1',
                                ), 'id=:id', array(':id'=>$user->id));
                                $command->execute();
                    }
                     }
                    //exit();
                    //print_r($FailLogHistory); print_r(count($FailLogHistory));exit;
			return false;
		}
	}

	/**
	 * Finds user by [[username]]
	 * @return User|null
	 */
	public function getUser()
	{
		if ( $this->_user === false )
		{
			$u = new \Yii::$app->user->identityClass;
			$this->_user = ($u instanceof User ? $u->findByUsername($this->username) : User::findByUsername($this->username));
		}

		return $this->_user;
	}
}
