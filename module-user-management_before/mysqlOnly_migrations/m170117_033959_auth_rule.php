<?php

use yii\db\Schema;
use yii\db\Migration;

class m170117_033959_auth_rule extends Migration
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
	        $tablename = \Yii::$app->getModule('user-management')->auth_rule_table;

        $this->createTable(
            $tablename,
            [
                'name'=> $this->string(64)->notNull(),
                'data'=> $this->text()->null()->defaultValue(null),
                'created_at'=> $this->integer(11)->null()->defaultValue(null),
                'updated_at'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable(\Yii::$app->getModule('user-management')->auth_rule_table);
    }
}
