<?php

namespace webvimark\modules\UserManagement\models;

use Yii;
use sammaye\audittrail\AuditTrail;
use sammaye\audittrail\LoggableBehavior;

/**
 * This is the model class for table "user_pass_history".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $password_hash
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $user
 */
class UserPassHistory  extends \webvimark\components\BaseActiveRecord
{
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
    public static function tableName()
    {
        //return 'user_pass_history';
        return Yii::$app->getModule('user-management')->user_pass_history_table;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            //[['created_at', 'updated_at'], 'required'],
            [['password_hash'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => UserManagementModule::t('back','ID'),
            'user_id' => UserManagementModule::t('back','User ID'),
            'password_hash' => UserManagementModule::t('back','Password Hash'),
            'created_at' => UserManagementModule::t('back','Created At'),
            'updated_at' => UserManagementModule::t('back','Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    public static function isInactive()
        {
           // $browser = new Browser();
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
}
