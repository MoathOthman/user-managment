<?php

use yii\db\Schema;
use yii\db\Migration;

class m170117_033936_user_pass_history extends Migration
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
	        $tablename = \Yii::$app->getModule('user-management')->user_pass_history_table;

        $this->createTable(
            $tablename,
            [
                'id'=> $this->primaryKey(11),
                'user_id'=> $this->integer(11)->null()->defaultValue(null),
                'password_hash'=> $this->string(255)->notNull()->defaultValue(''),
                'created_at'=> $this->integer(11)->null()->defaultValue(null),
                'updated_at'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('user_id',\Yii::$app->getModule('user-management')->user_pass_history_table,'user_id',false);
    }

    public function safeDown()
    {
        $this->dropIndex('user_id', \Yii::$app->getModule('user-management')->user_pass_history_table);
        $this->dropTable(\Yii::$app->getModule('user-management')->user_pass_history_table);
    }
}
