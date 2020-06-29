<?php

use yii\db\Schema;
use yii\db\Migration;

class m070209_024855_audit_trail extends Migration
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

        $this->createTable(
            'audit_trail',
            [
                'id'=> $this->primaryKey(11),
                'old_value'=> $this->text()->null()->defaultValue(null),
                'new_value'=> $this->text()->null()->defaultValue(null),
                'action'=> $this->string(255)->notNull(),
                'model'=> $this->string(255)->notNull(),
                'field'=> $this->string(255)->null()->defaultValue(null),
                'stamp'=> $this->datetime()->notNull(),
                'user_id'=> $this->string(255)->null()->defaultValue(null),
                'model_id'=> $this->string(255)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('idx_audit_trail_user_id','audit_trail','user_id',false);
        $this->createIndex('idx_audit_trail_model_id','audit_trail','model_id',false);
        $this->createIndex('idx_audit_trail_model','audit_trail','model',false);
        $this->createIndex('idx_audit_trail_field','audit_trail','field',false);
        $this->createIndex('idx_audit_trail_action','audit_trail','action',false);
    }

    public function safeDown()
    {
        $this->dropIndex('idx_audit_trail_user_id', 'audit_trail');
        $this->dropIndex('idx_audit_trail_model_id', 'audit_trail');
        $this->dropIndex('idx_audit_trail_model', 'audit_trail');
        $this->dropIndex('idx_audit_trail_field', 'audit_trail');
        $this->dropIndex('idx_audit_trail_action', 'audit_trail');
        $this->dropTable('audit_trail');
    }
}
