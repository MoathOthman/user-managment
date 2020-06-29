<?php

namespace webvimark\modules\UserManagement\models\rbacDB;

use webvimark\modules\UserManagement\UserManagementModule;  
use Yii;
use sammaye\audittrail\AuditTrail;
use sammaye\audittrail\LoggableBehavior;
/**
 * This is the model class for table "auth_item_detailed".
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $rule_name
 * @property string $data
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $group_code
 *
 * @property AuthRule $ruleName
 * @property AuthItemGroup $groupCode
 */
class AuthItemDetailed extends \yii\db\ActiveRecord
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
        //return 'auth_item_detailed';
        return Yii::$app->getModule('user-management')->auth_item_detailed_table;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name', 'group_code'], 'string', 'max' => 64],
           // [['rule_name'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['rule_name' => 'name']],
            //[['group_code'], 'exist', 'skipOnError' => true, 'targetClass' => AuthItemGroup::className(), 'targetAttribute' => ['group_code' => 'code']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'type' => 'Type',
            'description' => 'Description',
            'rule_name' => 'Rule Name',
            'data' => 'Data',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'group_code' => 'Group Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getRuleName()
//    {
//        return $this->hasOne(AuthRule::className(), ['name' => 'rule_name']);
//    }
//
//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getGroupCode()
//    {
//        return $this->hasOne(AuthItemGroup::className(), ['code' => 'group_code']);
//    }
}
