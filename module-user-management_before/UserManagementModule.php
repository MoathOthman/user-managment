<?php

namespace webvimark\modules\UserManagement;
use Ikimea\Browser\Browser;
use webvimark\helpers\LittleBigHelper;
use Yii;
use yii\helpers\ArrayHelper;
use webvimark\modules\UserManagement\models\UserPassHistory;

class UserManagementModule extends \yii\base\Module
{
	const SESSION_LAST_ATTEMPT = '_um_last_attempt';
	const SESSION_ATTEMPT_COUNT = '_um_attempt_count';

	/**
	 * If set true, then on registration username will be validated as email
	 *
	 * @var bool
	 */
	public $useEmailAsLogin = false;

	/**
	 * Works only if $useEmailAsLogin = true
	 *
	 * If set true, then on after registration message with activation code will be sent
	 * to user email and after confirmation user status will be "active"
	 *
	 * @var bool
	 * @see $useEmailAsLogin
	 */
	public $emailConfirmationRequired = false;

	/**
	 * Params for mailer
	 * They will be merged with $_defaultMailerOptions
	 *
	 * @var array
	 * @see $_defaultMailerOptions
	 */
	public $mailerOptions = [];

	/**
	 * Default options for mailer
	 *
	 * @var array
	 */
	protected $_defaultMailerOptions = [
		'from'=>'', // If empty it will be - [Yii::$app->params['adminEmail'] => Yii::$app->name . ' robot']

		'registrationFormViewFile'     => '/mail/registrationEmailConfirmation',
		'passwordRecoveryFormViewFile' => '/mail/passwordRecoveryMail',
		'confirmEmailFormViewFile'     => '/mail/emailConfirmationMail',
	];

	/**
	 * Permission that will be assigned automatically for everyone, so you can assign
	 * routes like "site/index" to this permission and those routes will be available for everyone
	 *
	 * Basically it's permission for guests (and of course for everyone else)
	 *
	 * @var string
	 */
	public $commonPermissionName = 'commonPermission';

	/**
	 * You can define your own registration form class here.
	 * Together with theming registration view file you can ultimately customize registration process.
	 *
	 * See AuthController::actionRegistration() and RegistrationForm how they work together
	 *
	 * @var string
	 */
	public $registrationFormClass = 'webvimark\modules\UserManagement\models\forms\RegistrationForm';

	/**
	 * After how many seconds confirmation token will be invalid
	 *
	 * @var int
	 */
	public $confirmationTokenExpire = 3600; // 1 hour
        
        public $passwordExpire = 30;

	/**
	 * Registration can be enabled either by this option or by adding '/user-management/auth/registration' route
	 * to guest permissions

	 * @var bool
	 */
	public $enableRegistration = true;

	/**
	 * Roles that will be assigned to user registered via user-management/auth/registration
	 *
	 * @var array
	 */
	public $rolesAfterRegistration = [];

	/**
	 * Pattern that will be applied for names on registration.
	 * Default pattern allows user enter only numbers and letters.
	 *
	 * This will not be used if $useEmailAsLogin set as true !
	 *
	 * @var string
	 */
	public $registrationRegexp = '/^(\w|\d)+$/';

	/**
	 * Pattern that will be applied for names on registration. It contain regexp that should NOT be in username
	 * Default pattern doesn't allow anything having "admin"
	 *
	 * This will not be used if $useEmailAsLogin set as true !
	 *
	 * @var string
	 */
	public $registrationBlackRegexp = '/^(.)*admin(.)*$/i';

	/**
	 * Pattern that will be applied for password.
	 * Default pattern does not restrict user and can enter any set of characters.
	 *
	 * example of pattern :
	 * '^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$'
	 *
	 * This example pattern allow user enter only:
	 *
	 * ^: anchored to beginning of string
	 * \S*: any set of characters
	 * (?=\S{8,}): of at least length 8
	 * (?=\S*[a-z]): containing at least one lowercase letter
	 * (?=\S*[A-Z]): and at least one uppercase letter
	 * (?=\S*[\d]): and at least one number
	 * $: anchored to the end of the string
	 *
	 * @var string
	 */
         public $passwordConfig = array(
                    'minimumPassword' => 8,
                    'maximumPassword' => 0,
                    'lowerCaseContain'=> true,
                    'upperCaseContain'=> true,
                    'numberContain'=> true,
                    'symbolContain'=> true,
                    //'passExpire' => 30,
                    'usernameCharFilter' => 5,
                    'passwordExpiryDay' => 30,
                    'passwordHistory' => 4, 
                    'bannedOnPasswordExpired'=>false,
                    'maxAttempts'=>5,
                    'maxAttemptFailedExpiry'=>60,
                    );
         
	 public $passwordRegexp = '/^(.*)+$/';

	/**
	 * Affects only web interface in "/user-management/user-permission/set" route. Tt means you still can assign
	 * multiple roles (for example via migrations) even if this attribute is "false"
	 *
	 * If true there will be checkbox list and user can have multiple roles.
	 * Otherwise there will be radio list and only 1 role can be assigned to user.
	 *
	 * @var bool
	 */
	public $userCanHaveMultipleRoles = true;

	/**
	 * How much attempts user can made to login or recover password in $attemptsTimeout seconds interval
	 *
	 * @var int
	 */
       
        
	public $maxAttempts = 0;

	/**
	 * Number of seconds after attempt counter to login or recover password will reset
	 *
	 * @var int
	 */
	public $attemptsTimeout = 60;
        
        public $passwordRequiryTitle = '';

	/**
	 * Options for registration and password recovery captcha
	 *
	 * @var array
	 */
	public $captchaOptions = [
		'class'     => 'yii\captcha\CaptchaAction',
		'minLength' => 3,
		'maxLength' => 4,
		'offset'    => 5
	];

	/**
	 * Table aliases
	 *
	 * @var string
	 */
	public $user_table = '{{%user}}';
	public $user_visit_log_table = '{{%user_visit_log}}';
        public $user_pass_history_table = '{{%user_pass_history}}';
	public $auth_item_table = '{{%auth_item}}';
        public $auth_item_detailed_table = '{{%auth_item_detailed}}';
	public $auth_item_child_table = '{{%auth_item_child}}';
	public $auth_item_group_table = '{{%auth_item_group}}';
	public $auth_assignment_table = '{{%auth_assignment}}';
	public $auth_rule_table = '{{%auth_rule}}';
        public $user_login_history_table = '{{user_login_history}}';

	public $controllerNamespace = 'webvimark\modules\UserManagement\controllers';

	/**
	 * @p
	 */
	public function init()
	{
                
                $browser = new Browser();
                
                $this->maxAttempts = $this->passwordConfig['maxAttempts'];
                $lcase = '';
                $ucase = '';
                $numbContain = '';
                $symContain = '';
                $minPass = !empty($this->passwordConfig['minimumPassword'])?$this->passwordConfig['minimumPassword']:'';
                $maxPass = !empty($this->passwordConfig['maximumPassword'])?$this->passwordConfig['maximumPassword']:'';
                $this->attemptsTimeout = intval($this->passwordConfig['maxAttemptFailedExpiry']);
                
                $passReqTitle = array();
                if($this-> passwordConfig['lowerCaseContain'])
                {
                    $lcase = 'a-z';
                    $passReqTitle[] = 'lowercase';
                }
                if($this-> passwordConfig['upperCaseContain'])
                {
                    $ucase = 'A-Z';
                    $passReqTitle[] = 'uppercase';
                }
                if($this-> passwordConfig['numberContain'])
                {
                    $numbContain = '0-9';
                    $passReqTitle[] = 'number';
                }
                if($this-> passwordConfig['symbolContain'])
                {
                    $symContain = '!@#$%';
                    $passReqTitle[] = 'symbol';
                }
                if(!empty($passReqTitle))
                {
                    $this->passwordRegexp = "/^(?=.*\d)(?=.*[A-Za-z])(?=.*[$@$!%*?&])[$numbContain$ucase$lcase$symContain]"."{"."$minPass,$maxPass"."}"."$/";
                    
                    $passtitle = ($passReqTitle);
                    array_pop($passtitle);
                    if(count($passReqTitle)>1)
                        $this->passwordRequiryTitle = 'Password should be contain '.implode(',', $passtitle).' and '.$passReqTitle[count($passReqTitle)-1];
                    else
                        $this->passwordRequiryTitle = 'Password should be contain '.implode(',', $passReqTitle); 
                }  
               
		parent::init();
                
		$this->prepareMailerOptions();
                
	}

	/**
	 * For Menu
	 *
	 * @return array
	 */
	public static function menuItems()
	{
		return [
			['label' => '<i class="fa fa-angle-double-right"></i> ' . UserManagementModule::t('back', 'Users'), 'url' => ['/user-management/user/index']],
			['label' => '<i class="fa fa-angle-double-right"></i> ' . UserManagementModule::t('back', 'Roles'), 'url' => ['/user-management/role/index']],
			['label' => '<i class="fa fa-angle-double-right"></i> ' . UserManagementModule::t('back', 'Permissions'), 'url' => ['/user-management/permission/index']],
			['label' => '<i class="fa fa-angle-double-right"></i> ' . UserManagementModule::t('back', 'Permission groups'), 'url' => ['/user-management/auth-item-group/index']],
			['label' => '<i class="fa fa-angle-double-right"></i> ' . UserManagementModule::t('back', 'Manage Route Labels'), 'url' => ['/user-management/auth-item-detailed/index']],
                        ['label' => '<i class="fa fa-angle-double-right"></i> ' . UserManagementModule::t('back', 'Visit log'), 'url' => ['/user-management/user-visit-log/index']],
		];
	}

	/**
	 * I18N helper
	 *
	 * @param string      $category
	 * @param string      $message
	 * @param array       $params
	 * @param null|string $language
	 *
	 * @return string
	 */
	public static function t($category, $message, $params = [], $language = null)
	{
		if ( !isset(Yii::$app->i18n->translations['modules/user-management/*']) )
		{
			Yii::$app->i18n->translations['modules/user-management/*'] = [
				'class'          => 'yii\i18n\PhpMessageSource',
				'sourceLanguage' => 'en',
				'basePath'       => '@vendor/webvimark/module-user-management/messages',
				'fileMap'        => [
					'modules/user-management/back' => 'back.php',
					'modules/user-management/front' => 'front.php',
				],
			];
		}

		return Yii::t('modules/user-management/' . $category, $message, $params, $language);
	}
        
	/**
	 * Check how much attempts user has been made in X seconds
	 *
	 * @return bool
	 */
	public function checkAttempts()
	{
		$lastAttempt = Yii::$app->session->get(static::SESSION_LAST_ATTEMPT);

		if ( $lastAttempt )
		{
			$attemptsCount = Yii::$app->session->get(static::SESSION_ATTEMPT_COUNT, 0);

			Yii::$app->session->set(static::SESSION_ATTEMPT_COUNT, ++$attemptsCount);

			// If last attempt was made more than X seconds ago then reset counters
			if ( ( $lastAttempt + $this->attemptsTimeout ) < time() )
			{
				Yii::$app->session->set(static::SESSION_LAST_ATTEMPT, time());
				Yii::$app->session->set(static::SESSION_ATTEMPT_COUNT, 1);

				return true;
			}
			elseif ( $attemptsCount > $this->maxAttempts )
			{
				return false;
			}

			return true;
		}

		Yii::$app->session->set(static::SESSION_LAST_ATTEMPT, time());
		Yii::$app->session->set(static::SESSION_ATTEMPT_COUNT, 1);

		return true;
	}

	/**
	 * Merge given mailer options with default
	 */
        protected function CheckInactiveStatus()
	{
		$query = new \yii\db\Query;
                $query->select('*')->from(models\UserVisitLog::tableName())
            ;
            //->limit($Limit);
        //  $query->asArray();
         $command = $query->createCommand();
       
        $visitLog = $command->queryAll();
            
                print_r($visitLog);
	}
        
	protected function prepareMailerOptions()
	{
		if ( !isset($this->mailerOptions['from']) )
		{
			$this->mailerOptions['from'] = [Yii::$app->params['adminEmail'] => Yii::$app->name . ' robot'];
		}

		$this->mailerOptions = ArrayHelper::merge($this->_defaultMailerOptions, $this->mailerOptions);
	}
}
