<?php

use yii\db\Schema;
use yii\db\Migration;

class m170117_034036_auth_assignment extends Migration
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
	        $tablename = \Yii::$app->getModule('user-management')->auth_assignment_table;

        $this->createTable(
            $tablename,
            [
                'item_name'=> $this->string(64)->notNull(),
                'user_id'=> $this->primaryKey(11),
                'created_at'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('item_name',\Yii::$app->getModule('user-management')->auth_assignment_table,'item_name',false);
        $this->createIndex('user_id',\Yii::$app->getModule('user-management')->auth_assignment_table,'user_id',false);
    }

    public function safeDown()
    {
        $this->dropIndex('user_id', \Yii::$app->getModule('user-management')->auth_assignment_table);
        $this->dropTable(\Yii::$app->getModule('user-management')->auth_assignment_table);
    }
}
