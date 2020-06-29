<?php

use yii\db\Schema;
use yii\db\Migration;

class m170117_033948_auth_item extends Migration
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
	        $tablename = \Yii::$app->getModule('user-management')->auth_item_table;

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
            ],$tableOptions
        );
        $this->createIndex('rule_name',\Yii::$app->getModule('user-management')->auth_item_table,'rule_name',false);
        $this->createIndex('idx-auth_item-type',\Yii::$app->getModule('user-management')->auth_item_table,'type',false);
        $this->createIndex('fk_auth_item_group_code',\Yii::$app->getModule('user-management')->auth_item_table,'group_code',false);
    }

    public function safeDown()
    {
        $this->dropIndex('rule_name', \Yii::$app->getModule('user-management')->auth_item_table);
        $this->dropIndex('idx-auth_item-type', \Yii::$app->getModule('user-management')->auth_item_table);
        $this->dropIndex('fk_auth_item_group_code', \Yii::$app->getModule('user-management')->auth_item_table);
        $this->dropTable(\Yii::$app->getModule('user-management')->auth_item_table);
    }
}
