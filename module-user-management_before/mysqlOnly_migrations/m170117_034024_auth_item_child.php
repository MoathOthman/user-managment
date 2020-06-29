<?php

use yii\db\Schema;
use yii\db\Migration;

class m170117_034024_auth_item_child extends Migration
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
	        $tablename = \Yii::$app->getModule('user-management')->auth_item_child_table;

        $this->createTable(
            $tablename,
            [
                'parent'=> $this->string(64)->notNull(),
                'child'=> $this->string(64)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('parent',\Yii::$app->getModule('user-management')->auth_item_child_table,'parent',false);
        $this->createIndex('child',\Yii::$app->getModule('user-management')->auth_item_child_table,'child',false);
    }

    public function safeDown()
    {
        $this->dropIndex('child', \Yii::$app->getModule('user-management')->auth_item_child_table);
        $this->dropTable(\Yii::$app->getModule('user-management')->auth_item_child_table);
    }
}
