<?php

use yii\db\Schema;
use yii\db\Migration;

class m170117_1034037_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_auth_assignment_item_name','{{%auth_assignment}}','item_name','auth_item',
'name','CASCADE','CASCADE');
        $this->addForeignKey('fk_auth_assignment_user_id','{{%auth_assignment}}','user_id','user',
'id','CASCADE','CASCADE');
    }

    public function safeDown()
    {
     $this->dropForeignKey('fk_auth_assignment_item_name', '{{%auth_assignment}}');
     $this->dropForeignKey('fk_auth_assignment_user_id', '{{%auth_assignment}}');
    }
}
