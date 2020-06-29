<?php

use yii\db\Schema;
use yii\db\Migration;

class m170117_034726_auth_itemDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%auth_item}}',
                           ["name", "type", "description", "rule_name", "data", "created_at", "updated_at", "group_code"],
                            [
    [
        'name' => '/*',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '//*',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '//controller',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '//crud',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '//extension',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '//form',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '//index',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '//model',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '//module',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/asset/*',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/asset/compress',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/asset/template',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/cache/*',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/cache/flush',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/cache/flush-all',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/cache/flush-schema',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/cache/index',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/fixture/*',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/fixture/load',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/fixture/unload',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/gii/*',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/gii/default/*',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/gii/default/action',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/gii/default/diff',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/gii/default/index',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/gii/default/preview',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/gii/default/view',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/hello/*',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/hello/index',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/help/*',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/help/index',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/message/*',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/message/config',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/message/extract',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/migrate/*',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/migrate/create',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/migrate/down',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/migrate/history',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/migrate/mark',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/migrate/new',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/migrate/redo',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/migrate/to',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/migrate/up',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/*',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth-item-group/*',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth-item-group/bulk-activate',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth-item-group/bulk-deactivate',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth-item-group/bulk-delete',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth-item-group/create',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth-item-group/delete',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth-item-group/grid-page-size',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth-item-group/grid-sort',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth-item-group/index',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth-item-group/toggle-attribute',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth-item-group/update',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth-item-group/view',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth/*',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth/captcha',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth/change-own-password',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth/confirm-email',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth/confirm-email-receive',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth/confirm-registration-email',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth/login',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth/logout',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth/password-recovery',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth/password-recovery-receive',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/auth/registration',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/permission/*',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/permission/bulk-activate',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/permission/bulk-deactivate',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/permission/bulk-delete',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/permission/create',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/permission/delete',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/permission/grid-page-size',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/permission/grid-sort',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/permission/index',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/permission/refresh-routes',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/permission/set-child-permissions',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/permission/set-child-routes',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/permission/toggle-attribute',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/permission/update',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/permission/view',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/role/*',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/role/bulk-activate',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/role/bulk-deactivate',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/role/bulk-delete',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/role/create',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/role/delete',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/role/grid-page-size',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/role/grid-sort',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/role/index',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/role/set-child-permissions',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/role/set-child-roles',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/role/toggle-attribute',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/role/update',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/role/view',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user-permission/*',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user-permission/set',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user-permission/set-roles',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user-visit-log/*',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user-visit-log/bulk-activate',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user-visit-log/bulk-deactivate',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user-visit-log/bulk-delete',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user-visit-log/create',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user-visit-log/delete',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user-visit-log/grid-page-size',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user-visit-log/grid-sort',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user-visit-log/index',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user-visit-log/toggle-attribute',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user-visit-log/update',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user-visit-log/view',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user/*',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user/bulk-activate',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user/bulk-deactivate',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user/bulk-delete',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user/change-password',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user/create',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user/delete',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user/grid-page-size',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user/grid-sort',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user/index',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user/toggle-attribute',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user/update',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => '/user-management/user/view',
        'type' => '3',
        'description' => null,
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => 'Admin',
        'type' => '1',
        'description' => 'Admin',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => null,
    ],
    [
        'name' => 'assignRolesToUsers',
        'type' => '2',
        'description' => 'Assign roles to users',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => 'userManagement',
    ],
    [
        'name' => 'bindUserToIp',
        'type' => '2',
        'description' => 'Bind user to IP',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => 'userManagement',
    ],
    [
        'name' => 'changeOwnPassword',
        'type' => '2',
        'description' => 'Change own password',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => 'userCommonPermissions',
    ],
    [
        'name' => 'changeUserPassword',
        'type' => '2',
        'description' => 'Change user password',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => 'userManagement',
    ],
    [
        'name' => 'commonPermission',
        'type' => '2',
        'description' => 'Common permission',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062188',
        'updated_at' => '1426062188',
        'group_code' => null,
    ],
    [
        'name' => 'createUsers',
        'type' => '2',
        'description' => 'Create users',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => 'userManagement',
    ],
    [
        'name' => 'deleteUsers',
        'type' => '2',
        'description' => 'Delete users',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => 'userManagement',
    ],
    [
        'name' => 'editUserEmail',
        'type' => '2',
        'description' => 'Edit user email',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => 'userManagement',
    ],
    [
        'name' => 'editUsers',
        'type' => '2',
        'description' => 'Edit users',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => 'userManagement',
    ],
    [
        'name' => 'viewRegistrationIp',
        'type' => '2',
        'description' => 'View registration IP',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => 'userManagement',
    ],
    [
        'name' => 'viewUserEmail',
        'type' => '2',
        'description' => 'View user email',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => 'userManagement',
    ],
    [
        'name' => 'viewUserRoles',
        'type' => '2',
        'description' => 'View user roles',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => 'userManagement',
    ],
    [
        'name' => 'viewUsers',
        'type' => '2',
        'description' => 'View users',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => 'userManagement',
    ],
    [
        'name' => 'viewVisitLog',
        'type' => '2',
        'description' => 'View visit log',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1426062189',
        'updated_at' => '1426062189',
        'group_code' => 'userManagement',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%auth_item}} CASCADE');
    }
}