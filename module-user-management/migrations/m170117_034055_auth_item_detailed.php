<?php

use yii\db\Schema;
use yii\db\Migration;

class m170117_034055_auth_item_detailed extends Migration
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
	        $tablename = \Yii::$app->getModule('user-management')->auth_item_detailed_table;

        $this->createTable(
            $tablename,
            [
                'name'=> $this->string(64)->notNull(),
                'type'=> $this->integer(11)->notNull(),
                'description'=> $this->text()->null()->defaultValue(null),
                'rule_name'=> $this->string(64)->null()->defaultValue(null),
                'data'=> $this->text()->null()->defaultValue(null),
                'created_at'=> $this->integer(11)->null()->defaultValue(null),
                'updated_at'=> $this->integer(11)->null()->defaultValue(null),
                'group_code'=> $this->string(64)->null()->defaultValue(null),
                'PRIMARY KEY (name)',
            ],$tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable(\Yii::$app->getModule('user-management')->auth_item_detailed_table);
    }
}
