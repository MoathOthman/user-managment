<?php

use yii\db\Schema;
use yii\db\Migration;

class m170117_1033949_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_auth_item_rule_name','{{%auth_item}}','rule_name','auth_rule',
'name','CASCADE','CASCADE');
        $this->addForeignKey('fk_auth_item_group_code','{{%auth_item}}','group_code','auth_item_group',
'code','CASCADE','CASCADE');
    }

    public function safeDown()
    {
     $this->dropForeignKey('fk_auth_item_rule_name', '{{%auth_item}}');
     $this->dropForeignKey('fk_auth_item_group_code', '{{%auth_item}}');
    }
}
