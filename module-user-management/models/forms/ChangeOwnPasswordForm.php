<?php
namespace webvimark\modules\UserManagement\models\forms;

use webvimark\modules\UserManagement\models\User;
use webvimark\modules\UserManagement\models\UserPassHistory;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\base\Model;
use Yii;

use sammaye\audittrail\AuditTrail;
use sammaye\audittrail\LoggableBehavior;
class ChangeOwnPasswordForm extends Model
{
	/**
	 * @var User
	 */
	public $user;

	/**
	 * @var string
	 */
	public $current_password;
	/**
	 * @var string
	 */
	public $password;
	/**
	 * @var string
	 */
	public $repeat_password;

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
         
                $text = trim(\Yii::$app->user->username);
                $length  = Yii::$app->getModule('user-management')->passwordConfig['usernameCharFilter'];
                $value = array();
                if(strlen($text)<$length)  $length = strlen($text);
                for($a=0; $a< (strlen($text)-$length+1); $a++)
                {
                        $value[] = substr($text, $a, $length);
                }

                $filterText = implode('|', $value);
                
		$return = [
			
			[['password', 'repeat_password'], 'required'],
			[['password', 'repeat_password', 'current_password'], 'string', 'max'=>255],
			[['password', 'repeat_password', 'current_password'], 'trim'],
			
                        //['password', 'match', 'pattern' => '/^((?!'.$filterText.').)*$/i', 'message' => 'Your password could not contain your username'],
                        ['password', 'match', 'pattern' => '/^[^\s]*$/','message' => 'Whitespace is not allowed'],
                        ['password', 'match', 'pattern' => Yii::$app->getModule('user-management')->passwordRegexp, 'message' => Yii::$app->getModule('user-management')->passwordRequiryTitle],

			['repeat_password', 'compare', 'compareAttribute'=>'password'],

			['current_password', 'required', 'except'=>'restoreViaEmail'],
			['current_password', 'validateCurrentPassword', 'except'=>'restoreViaEmail'],
		
		];
                if(!empty($filterText))
                {
                   $return[]= ['password', 'match', 'pattern' => '/^((?!'.$filterText.').)*$/i', 'message' => 'Your password could not contain your username'];
                }
                return $return;

		
	}
        public function traceUsername($user_name, $length)
        {
            
            return '';
        }
	public function attributeLabels()
	{
		return [
			'current_password' => UserManagementModule::t('back', 'Current password'),
			'password'         => UserManagementModule::t('front', 'Password'),
			'repeat_password'  => UserManagementModule::t('front', 'Repeat password'),
		];
	}


	/**
	 * Validates current password
	 */
	public function validateCurrentPassword()
	{
		if ( !Yii::$app->getModule('user-management')->checkAttempts() )
		{
			$this->addError('current_password', UserManagementModule::t('back', 'You have reach maximum attemp'));

			return false;
		}

		if ( !Yii::$app->security->validatePassword($this->current_password, $this->user->password_hash) )
		{
			$this->addError('current_password', UserManagementModule::t('back', "Wrong current password"));
		}
	}

	/**
	 * @param bool $performValidation
	 *
	 * @return bool
	 */
	public function changePassword($performValidation = true)
	{
		if ( $performValidation AND !$this->validate() )
		{
			return false;
		}
                
                if (preg_match('/^(.)*'.trim(\Yii::$app->user->username).'(.)*$/i', $this->password)  )
		{
			$this->addError('password', UserManagementModule::t('back', "Your password could not contains your username ff"));
                        return false;
                }
                
                
                $check_history =    UserPassHistory::find()
                ->where(['user_id' => $this->user->id])
                ->orderBy([
                       //'usertype'=>SORT_ASC,
                       'id' => SORT_DESC,
                        ])
                ->limit(Yii::$app->getModule('user-management')->passwordConfig['passwordHistory'])
                ->all();
                
        //print_r($check_history);
        //echo "<hr/>";
                //$current_password = Yii::$app->security->validatePassword($this->password);
        for($a=0; $a<count($check_history); $a++)
        {
            //($check_history[$a]->password_hash);
            
            if ( Yii::$app->security->validatePassword($this->password, $check_history[$a]->password_hash) )
		{
			$this->addError('password', UserManagementModule::t('back', "You have used the password before. Find another password."));
                        return false;
		}
        }
       // exit;

		$this->user->password = $this->password;
                $this->user->lastpass_changed = time();
		$this->user->removeConfirmationToken();
                
                                
                                
		$is_saved = $this->user->save();
                if($is_saved)
                {
                    Yii::$app->db->createCommand()
				->insert(Yii::$app->getModule('user-management')->user_pass_history_table, [
					'user_id' => $this->user->id,
					//'password_hash' => $this->password,
                                        'password_hash' => $this->user->password_hash,
					'created_at' => time(),
				])->execute();
                   
                    return $is_saved;
                }
	}
}
