<?php

use yii\db\Schema;
use yii\db\Migration;

class m170210_064113_user_login_history extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
      //  $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%user_login_history}}',
            [
                'id'=> $this->bigPrimaryKey(20),
                'user_id'=> $this->integer(11)->null()->defaultValue(null),
                'username'=> $this->string(50)->null()->defaultValue(null),
                'password_hash'=> $this->string(255)->notNull()->defaultValue(''),
                'created_at'=> $this->integer(11)->null()->defaultValue(null),
                'updated_at'=> $this->integer(11)->null()->defaultValue(null),
                'is_success'=> $this->string()->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('user_id',\Yii::$app->getModule('user-management')->user_login_history_table,'user_id',false);
    }

    public function safeDown()
    {
        $this->dropIndex('user_id', \Yii::$app->getModule('user-management')->user_login_history_table);
        $this->dropTable(\Yii::$app->getModule('user-management')->user_login_history_table);
    }
}
