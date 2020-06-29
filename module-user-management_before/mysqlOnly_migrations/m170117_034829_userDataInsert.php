<?php

use yii\db\Schema;
use yii\db\Migration;

class m170117_034829_userDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%user}}',
                           ["id", "username", "auth_key", "password_hash", "confirmation_token", "status", "superadmin", "created_at", "updated_at", "registration_ip", "bind_to_ip", "email", "email_confirmed", "lastpass_changed", "last_wrong_login", "wrong_count"],
                            [
    [
        'id' => '1',
        'username' => 'superadmin',
        'auth_key' => 'kz2px152FAWlkHbkZoCiXgBAd-S8SSjF',
        'password_hash' => '$2y$13$MhlYe12xkGFnSeK0sO2up.Y9kAD9Ct6JS1i9VLP7YAqd1dFsSylz2',
        'confirmation_token' => null,
        'status' => '1',
        'superadmin' => '1',
        'created_at' => '1426062188',
        'updated_at' => '1426062188',
        'registration_ip' => null,
        'bind_to_ip' => null,
        'email' => null,
        'email_confirmed' => '0',
        'lastpass_changed' => null,
        'last_wrong_login' => null,
        'wrong_count' => null,
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%user}} CASCADE');
    }
}
