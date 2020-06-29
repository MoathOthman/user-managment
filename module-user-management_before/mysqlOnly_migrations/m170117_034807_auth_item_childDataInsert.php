<?php

use yii\db\Schema;
use yii\db\Migration;

class m170117_034807_auth_item_childDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%auth_item_child}}',
                           ["parent", "child"],
                            [
    [
        'parent' => 'changeOwnPassword',
        'child' => '/user-management/auth/change-own-password',
    ],
    [
        'parent' => 'assignRolesToUsers',
        'child' => '/user-management/user-permission/set',
    ],
    [
        'parent' => 'assignRolesToUsers',
        'child' => '/user-management/user-permission/set-roles',
    ],
    [
        'parent' => 'viewVisitLog',
        'child' => '/user-management/user-visit-log/grid-page-size',
    ],
    [
        'parent' => 'viewVisitLog',
        'child' => '/user-management/user-visit-log/index',
    ],
    [
        'parent' => 'viewVisitLog',
        'child' => '/user-management/user-visit-log/view',
    ],
    [
        'parent' => 'editUsers',
        'child' => '/user-management/user/bulk-activate',
    ],
    [
        'parent' => 'editUsers',
        'child' => '/user-management/user/bulk-deactivate',
    ],
    [
        'parent' => 'deleteUsers',
        'child' => '/user-management/user/bulk-delete',
    ],
    [
        'parent' => 'changeUserPassword',
        'child' => '/user-management/user/change-password',
    ],
    [
        'parent' => 'createUsers',
        'child' => '/user-management/user/create',
    ],
    [
        'parent' => 'deleteUsers',
        'child' => '/user-management/user/delete',
    ],
    [
        'parent' => 'viewUsers',
        'child' => '/user-management/user/grid-page-size',
    ],
    [
        'parent' => 'viewUsers',
        'child' => '/user-management/user/index',
    ],
    [
        'parent' => 'editUsers',
        'child' => '/user-management/user/update',
    ],
    [
        'parent' => 'viewUsers',
        'child' => '/user-management/user/view',
    ],
    [
        'parent' => 'Admin',
        'child' => 'assignRolesToUsers',
    ],
    [
        'parent' => 'Admin',
        'child' => 'changeOwnPassword',
    ],
    [
        'parent' => 'Admin',
        'child' => 'changeUserPassword',
    ],
    [
        'parent' => 'Admin',
        'child' => 'createUsers',
    ],
    [
        'parent' => 'Admin',
        'child' => 'deleteUsers',
    ],
    [
        'parent' => 'Admin',
        'child' => 'editUsers',
    ],
    [
        'parent' => 'editUserEmail',
        'child' => 'viewUserEmail',
    ],
    [
        'parent' => 'assignRolesToUsers',
        'child' => 'viewUserRoles',
    ],
    [
        'parent' => 'Admin',
        'child' => 'viewUsers',
    ],
    [
        'parent' => 'assignRolesToUsers',
        'child' => 'viewUsers',
    ],
    [
        'parent' => 'changeUserPassword',
        'child' => 'viewUsers',
    ],
    [
        'parent' => 'createUsers',
        'child' => 'viewUsers',
    ],
    [
        'parent' => 'deleteUsers',
        'child' => 'viewUsers',
    ],
    [
        'parent' => 'editUsers',
        'child' => 'viewUsers',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%auth_item_child}} CASCADE');
    }
}
