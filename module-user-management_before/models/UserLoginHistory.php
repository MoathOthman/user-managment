<?php

namespace webvimark\modules\UserManagement\models;

use Yii;

/**
 * This is the model class for table "user_login_history".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $username
 * @property string $password_hash
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $is_success
 */
class UserLoginHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return Yii::$app->getModule('user-management')->user_login_history_table;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['is_success'], 'string'],
            [['username'], 'string', 'max' => 50],
            [['password_hash'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_success' => 'Is Success',
        ];
    }
}
