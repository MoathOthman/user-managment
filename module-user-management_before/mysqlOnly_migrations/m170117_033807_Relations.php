<?php

use yii\db\Schema;
use yii\db\Migration;

class m170117_033807_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_user_visit_log_user_id','{{%user_visit_log}}','user_id','user',
'id','CASCADE','CASCADE');
    }

    public function safeDown()
    {
     $this->dropForeignKey('fk_user_visit_log_user_id', '{{%user_visit_log}}');
    }
}
