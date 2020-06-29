<?php

use yii\db\Schema;
use yii\db\Migration;

class m170117_034819_auth_item_groupDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%auth_item_group}}',
                           ["code", "name", "created_at", "updated_at"],
                            [
    [
        'code' => 'userCommonPermissions',
        'name' => 'User common permission',
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
    ],
    [
        'code' => 'userManagement',
        'name' => 'User management',
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%auth_item_group}} CASCADE');
    }
}
