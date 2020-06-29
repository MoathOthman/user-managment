<?php

use yii\db\Schema;
use yii\db\Migration;

class m170117_033937_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_user_pass_history_user_id','{{%user_pass_history}}','user_id','user',
'id','CASCADE','CASCADE');
    }

    public function safeDown()
    {
     $this->dropForeignKey('fk_user_pass_history_user_id', '{{%user_pass_history}}');
    }
}
