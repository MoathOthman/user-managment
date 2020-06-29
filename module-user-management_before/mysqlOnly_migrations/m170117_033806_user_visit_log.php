<?php

use yii\db\Schema;
use yii\db\Migration;

class m170117_033806_user_visit_log extends Migration
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
	        $tablename = \Yii::$app->getModule('user-management')->user_visit_log_table;

        $this->createTable(
            $tablename,
            [
                'id'=> $this->primaryKey(11),
                'token'=> $this->string(255)->notNull(),
                'ip'=> $this->string(15)->notNull(),
                'language'=> $this->char(2)->notNull(),
                'user_agent'=> $this->string(255)->notNull(),
                'user_id'=> $this->integer(11)->null()->defaultValue(null),
                'visit_time'=> $this->integer(11)->notNull(),
                'browser'=> $this->string(30)->null()->defaultValue(null),
                'os'=> $this->string(20)->null()->defaultValue(null),
                'visit_status'=> $this->integer(11)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('user_id',\Yii::$app->getModule('user-management')->user_visit_log_table,'user_id',false);
    }

    public function safeDown()
    {
        $this->dropIndex('user_id', \Yii::$app->getModule('user-management')->user_visit_log_table);
        $this->dropTable(\Yii::$app->getModule('user-management')->user_visit_log_table);
    }
}
