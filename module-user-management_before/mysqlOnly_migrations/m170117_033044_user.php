<?php

use yii\db\Schema;
use yii\db\Migration;

class m170117_033044_user extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = null;
		if ( $this->db->driverName === 'mysql' )
		{
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}

	        // Check if user Table exist
	        // $tablename = \Yii::$app->db->tablePrefix.'user';
	        $tablename = \Yii::$app->getModule('user-management')->user_table;

        $this->createTable(
            $tablename,
            [
                'id'=> $this->primaryKey(11),
                'username'=> $this->string(255)->notNull(),
                'auth_key'=> $this->string(32)->notNull(),
                'password_hash'=> $this->string(255)->notNull(),
                'confirmation_token'=> $this->string(255)->null()->defaultValue(null),
                'status'=> $this->integer(11)->notNull()->defaultValue(1),
                'superadmin'=> $this->smallInteger(1)->null()->defaultValue(0),
                'created_at'=> $this->integer(11)->notNull(),
                'updated_at'=> $this->integer(11)->notNull(),
                'registration_ip'=> $this->string(15)->null()->defaultValue(null),
                'bind_to_ip'=> $this->string(255)->null()->defaultValue(null),
                'email'=> $this->string(128)->null()->defaultValue(null),
                'email_confirmed'=> $this->smallInteger(1)->notNull()->defaultValue(0),
                'lastpass_changed'=> $this->integer(11)->null()->defaultValue(null),
                'last_wrong_login'=> $this->datetime()->null()->defaultValue(null),
                'wrong_count'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable(\Yii::$app->getModule('user-management')->user_table);
    }
}
