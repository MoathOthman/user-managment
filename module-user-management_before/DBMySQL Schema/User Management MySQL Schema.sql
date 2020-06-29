# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: service3
# Generation Time: 2017-01-13 03:34:05 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table auth_assignment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auth_assignment`;

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_assignment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`)
VALUES
	('Admin',2,1483589446),
	('member',3,1489290355);

/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table auth_item
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auth_item`;

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `group_code` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  KEY `fk_auth_item_group_code` (`group_code`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_auth_item_group_code` FOREIGN KEY (`group_code`) REFERENCES `auth_item_group` (`code`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`, `group_code`)
VALUES
	('/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/debug/*',3,NULL,NULL,NULL,1483522189,1483522189,NULL),
	('/debug/default/*',3,NULL,NULL,NULL,1483522189,1483522189,NULL),
	('/debug/default/db-explain',3,NULL,NULL,NULL,1483522189,1483522189,NULL),
	('/debug/default/download-mail',3,NULL,NULL,NULL,1483522189,1483522189,NULL),
	('/debug/default/index',3,NULL,NULL,NULL,1483522189,1483522189,NULL),
	('/debug/default/toolbar',3,NULL,NULL,NULL,1483522189,1483522189,NULL),
	('/debug/default/view',3,NULL,NULL,NULL,1483522189,1483522189,NULL),
	('/gii/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/gii/default/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/gii/default/action',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/gii/default/diff',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/gii/default/index',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/gii/default/preview',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/gii/default/view',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/site/*',3,NULL,NULL,NULL,1483522189,1483522189,NULL),
	('/site/about',3,NULL,NULL,NULL,1483522189,1483522189,NULL),
	('/site/captcha',3,NULL,NULL,NULL,1483522189,1483522189,NULL),
	('/site/contact',3,'Contact',NULL,NULL,1483522189,1483522189,NULL),
	('/site/error',3,NULL,NULL,NULL,1483522189,1483522189,NULL),
	('/site/index',3,NULL,NULL,NULL,1483522189,1483522189,NULL),
	('/site/login',3,NULL,NULL,NULL,1483522189,1483522189,NULL),
	('/site/logout',3,NULL,NULL,NULL,1483522189,1483522189,NULL),
	('/user-management/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/bulk-activate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/bulk-deactivate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/bulk-delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/create',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/grid-page-size',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/grid-sort',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/index',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/toggle-attribute',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/update',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/view',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/captcha',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/change-own-password',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/confirm-email',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/confirm-email-receive',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/confirm-registration-email',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/login',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/logout',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/password-recovery',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/password-recovery-receive',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/registration',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/bulk-activate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/bulk-deactivate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/bulk-delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/create',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/grid-page-size',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/grid-sort',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/index',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/refresh-routes',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/set-child-permissions',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/set-child-routes',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/toggle-attribute',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/update',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/view',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/bulk-activate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/bulk-deactivate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/bulk-delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/create',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/grid-page-size',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/grid-sort',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/index',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/set-child-permissions',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/set-child-roles',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/toggle-attribute',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/update',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/view',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-permission/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-permission/set',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-permission/set-roles',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/bulk-activate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/bulk-deactivate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/bulk-delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/create',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/grid-page-size',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/grid-sort',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/index',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/toggle-attribute',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/update',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/view',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/bulk-activate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/bulk-deactivate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/bulk-delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/change-password',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/create',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/grid-page-size',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/grid-sort',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/index',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/toggle-attribute',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/update',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/view',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('Admin',1,'Admin',NULL,NULL,1426062189,1426062189,NULL),
	('assignRolesToUsers',2,'Assign roles to users',NULL,NULL,1426062189,1426062189,'userManagement'),
	('bindUserToIp',2,'Bind user to IP',NULL,NULL,1426062189,1426062189,'userManagement'),
	('changeOwnPassword',2,'Change own password',NULL,NULL,1426062189,1426062189,'userCommonPermissions'),
	('changeUserPassword',2,'Change user password',NULL,NULL,1426062189,1426062189,'userManagement'),
	('commonPermission',2,'Common permission',NULL,NULL,1426062188,1426062188,NULL),
	('createUsers',2,'Create users',NULL,NULL,1426062189,1426062189,'userManagement'),
	('deleteUsers',2,'Delete users',NULL,NULL,1426062189,1426062189,'userManagement'),
	('editUserEmail',2,'Edit user email',NULL,NULL,1426062189,1426062189,'userManagement'),
	('editUsers',2,'Edit users',NULL,NULL,1426062189,1426062189,'userManagement'),
	('member',1,'member',NULL,NULL,1489290325,1489290325,NULL),
	('viewRegistrationIp',2,'View registration IP',NULL,NULL,1426062189,1426062189,'userManagement'),
	('viewUserEmail',2,'View user email',NULL,NULL,1426062189,1426062189,'userManagement'),
	('viewUserRoles',2,'View user roles',NULL,NULL,1426062189,1426062189,'userManagement'),
	('viewUsers',2,'View users',NULL,NULL,1426062189,1426062189,'userManagement'),
	('viewVisitLog',2,'View visit log',NULL,NULL,1426062189,1426062189,'userManagement');

/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table auth_item_child
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auth_item_child`;

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;

INSERT INTO `auth_item_child` (`parent`, `child`)
VALUES
	('assignRolesToUsers','/debug/default/db-explain'),
	('changeOwnPassword','/user-management/auth/change-own-password'),
	('assignRolesToUsers','/user-management/user-permission/set'),
	('assignRolesToUsers','/user-management/user-permission/set-roles'),
	('viewVisitLog','/user-management/user-visit-log/grid-page-size'),
	('viewVisitLog','/user-management/user-visit-log/index'),
	('viewVisitLog','/user-management/user-visit-log/view'),
	('editUsers','/user-management/user/bulk-activate'),
	('editUsers','/user-management/user/bulk-deactivate'),
	('deleteUsers','/user-management/user/bulk-delete'),
	('changeUserPassword','/user-management/user/change-password'),
	('createUsers','/user-management/user/create'),
	('deleteUsers','/user-management/user/delete'),
	('viewUsers','/user-management/user/grid-page-size'),
	('viewUsers','/user-management/user/index'),
	('editUsers','/user-management/user/update'),
	('viewUsers','/user-management/user/view'),
	('Admin','assignRolesToUsers'),
	('Admin','changeOwnPassword'),
	('assignRolesToUsers','changeOwnPassword'),
	('changeUserPassword','changeOwnPassword'),
	('Admin','changeUserPassword'),
	('member','changeUserPassword'),
	('Admin','createUsers'),
	('Admin','deleteUsers'),
	('Admin','editUsers'),
	('editUserEmail','viewUserEmail'),
	('assignRolesToUsers','viewUserRoles'),
	('Admin','viewUsers'),
	('assignRolesToUsers','viewUsers'),
	('changeUserPassword','viewUsers'),
	('createUsers','viewUsers'),
	('deleteUsers','viewUsers'),
	('editUsers','viewUsers');

/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table auth_item_detailed
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auth_item_detailed`;

CREATE TABLE `auth_item_detailed` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `group_code` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `auth_item_detailed` WRITE;
/*!40000 ALTER TABLE `auth_item_detailed` DISABLE KEYS */;

INSERT INTO `auth_item_detailed` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`, `group_code`)
VALUES
	('/*',3,'All Menu','','',1426062189,1426062189,''),
	('/debug/*',3,'Debug',NULL,NULL,1483522189,1483522189,NULL),
	('/debug/default/*',3,'Default Debug',NULL,NULL,1483522189,1483522189,NULL),
	('/debug/default/db-explain',3,'DBExplain Debug',NULL,NULL,1483522189,1483522189,NULL),
	('/debug/default/download-mail',3,'Download Mail Debug',NULL,NULL,1483522189,1483522189,NULL),
	('/debug/default/index',3,'Debug List',NULL,NULL,1483522189,1483522189,NULL),
	('/debug/default/toolbar',3,'Debug Toolbar',NULL,NULL,1483522189,1483522189,NULL),
	('/debug/default/view',3,'Debug View',NULL,NULL,1483522189,1483522189,NULL),
	('/gii/*',3,'Gii',NULL,NULL,1426062189,1426062189,NULL),
	('/gii/default/*',3,'Default Gii',NULL,NULL,1426062189,1426062189,NULL),
	('/gii/default/action',3,'Action of Gii',NULL,NULL,1426062189,1426062189,NULL),
	('/gii/default/diff',3,'Diff on Gii',NULL,NULL,1426062189,1426062189,NULL),
	('/gii/default/index',3,'Menu of Gii',NULL,NULL,1426062189,1426062189,NULL),
	('/gii/default/preview',3,'Preview on Gii',NULL,NULL,1426062189,1426062189,NULL),
	('/gii/default/view',3,'View on Gii',NULL,NULL,1426062189,1426062189,NULL),
	('/site/*',3,'Site',NULL,NULL,1483522189,1483522189,NULL),
	('/site/about',3,'About Site',NULL,NULL,1483522189,1483522189,NULL),
	('/site/captcha',3,'Captcha on Site',NULL,NULL,1483522189,1483522189,NULL),
	('/site/contact',3,'Contact',NULL,NULL,1483522189,1483522189,NULL),
	('/site/error',3,'Error of Site',NULL,NULL,1483522189,1483522189,NULL),
	('/site/index',3,'Index of Site',NULL,NULL,1483522189,1483522189,NULL),
	('/site/login',3,'Default Login Page ',NULL,NULL,1483522189,1483522189,NULL),
	('/site/logout',3,'Default Logout Page',NULL,NULL,1483522189,1483522189,NULL),
	('/user-management/*',3,'All in User Management',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/*',3,'RBAC Item Group',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/bulk-activate',3,'RBAC Active Item Group',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/bulk-deactivate',3,'RBAC Deactive Item Group',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/bulk-delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/create',3,'Create Item Group','','',1426062189,1426062189,''),
	('/user-management/auth-item-group/delete',3,'Delete Item Group','','',1426062189,1426062189,''),
	('/user-management/auth-item-group/grid-page-size',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/grid-sort',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/index',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/toggle-attribute',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/update',3,'RBAC Update Auth Item',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth-item-group/view',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/*',3,'Authentication',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/captcha',3,'Captcha on Auth',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/change-own-password',3,'Change Own Password',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/confirm-email',3,'Email Confirmation',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/confirm-email-receive',3,'Receive Email Confirmation',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/confirm-registration-email',3,'Confirm Registration Email',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/login',3,'Login Page',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/logout',3,'Logout Page',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/password-recovery',3,'Password Recovery',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/password-recovery-receive',3,'Receive Password Recovery',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/auth/registration',3,'Registration Page',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/*',3,'Permission',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/bulk-activate',3,'Activation on Permission',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/bulk-deactivate',3,'Deactivation on Permision',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/bulk-delete',3,'Delete Bulk on Permission',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/create',3,'Create Permission','','',1426062189,1426062189,''),
	('/user-management/permission/delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/grid-page-size',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/grid-sort',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/index',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/refresh-routes',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/set-child-permissions',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/set-child-routes',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/toggle-attribute',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/update',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/permission/view',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/bulk-activate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/bulk-deactivate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/bulk-delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/create',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/grid-page-size',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/grid-sort',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/index',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/set-child-permissions',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/set-child-roles',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/toggle-attribute',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/update',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/role/view',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-permission/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-permission/set',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-permission/set-roles',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/bulk-activate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/bulk-deactivate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/bulk-delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/create',3,'Create Visit Log',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/delete',3,'Delete Visit Log',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/grid-page-size',3,'Grid Page Size on Visit Log',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/grid-sort',3,'Grid Sort',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/index',3,'Index on Visit Log',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/toggle-attribute',3,'Toogle Attribe Visit Log',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/update',3,'Update Visit Log',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user-visit-log/view',3,'View Visit Log',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/*',3,'User',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/bulk-activate',3,'Active User',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/bulk-deactivate',3,'Deactive User',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/bulk-delete',3,'Delete Bulk User',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/change-password',3,'Change Password User',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/create',3,'Create User',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/delete',3,'Delete User',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/grid-page-size',3,'Grid Page Size',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/grid-sort',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/index',3,NULL,NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/toggle-attribute',3,'Toogle Attribute User',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/update',3,'Update User',NULL,NULL,1426062189,1426062189,NULL),
	('/user-management/user/view',3,'View User',NULL,NULL,1426062189,1426062189,NULL),
	('Admin',1,'Admin',NULL,NULL,1426062189,1426062189,NULL),
	('assignRolesToUsers',2,'Assign roles to users',NULL,NULL,1426062189,1426062189,'userManagement'),
	('bindUserToIp',2,'Bind user to IP',NULL,NULL,1426062189,1426062189,'userManagement'),
	('changeOwnPassword',2,'Change own password',NULL,NULL,1426062189,1426062189,'userCommonPermissions'),
	('changeUserPassword',2,'Change user password',NULL,NULL,1426062189,1426062189,'userManagement'),
	('commonPermission',2,'Common permission',NULL,NULL,1426062188,1426062188,NULL),
	('createUsers',2,'Create users',NULL,NULL,1426062189,1426062189,'userManagement'),
	('deleteUsers',2,'Delete users',NULL,NULL,1426062189,1426062189,'userManagement'),
	('editUserEmail',2,'Edit user email',NULL,NULL,1426062189,1426062189,'userManagement'),
	('editUsers',2,'Edit users',NULL,NULL,1426062189,1426062189,'userManagement'),
	('viewRegistrationIp',2,'View registration IP',NULL,NULL,1426062189,1426062189,'userManagement'),
	('viewUserEmail',2,'View user email',NULL,NULL,1426062189,1426062189,'userManagement'),
	('viewUserRoles',2,'View user roles',NULL,NULL,1426062189,1426062189,'userManagement'),
	('viewUsers',2,'View users',NULL,NULL,1426062189,1426062189,'userManagement'),
	('viewVisitLog',2,'View visit log',NULL,NULL,1426062189,1426062189,'userManagement');

/*!40000 ALTER TABLE `auth_item_detailed` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table auth_item_group
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auth_item_group`;

CREATE TABLE `auth_item_group` (
  `code` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `auth_item_group` WRITE;
/*!40000 ALTER TABLE `auth_item_group` DISABLE KEYS */;

INSERT INTO `auth_item_group` (`code`, `name`, `created_at`, `updated_at`)
VALUES
	('userCommonPermissions','User common permission',1426062189,1426062189),
	('userManagement','User management',1426062189,1426062189);

/*!40000 ALTER TABLE `auth_item_group` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table auth_rule
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auth_rule`;

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `confirmation_token` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `superadmin` smallint(1) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `registration_ip` varchar(15) DEFAULT NULL,
  `bind_to_ip` varchar(255) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `email_confirmed` smallint(1) NOT NULL DEFAULT '0',
  `lastpass_changed` int(11) DEFAULT NULL,
  `last_wrong_login` datetime DEFAULT NULL,
  `wrong_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `confirmation_token`, `status`, `superadmin`, `created_at`, `updated_at`, `registration_ip`, `bind_to_ip`, `email`, `email_confirmed`, `lastpass_changed`, `last_wrong_login`, `wrong_count`)
VALUES
	(1,'superadmin','kz2px152FAWlkHbkZoCiXgBAd-S8SSjF','$2y$13$M5n/MIoAR8DgeoZLHCQ6NeGZHDYZjX006UR7.xRPKCpddxIvlmTba',NULL,1,1,1426062188,1484210149,NULL,'',NULL,0,1484210145,NULL,NULL),
	(2,'imam','6f-fgrQ1ic7DYG2_F59IOoqI0eY8UWO-','$2y$13$qVWGy43oGWNIXWmw2A.fQOPTc.dgM/oKJMxqOB6Gv91JBmn.e6JS6',NULL,1,1,1483523894,1484190864,'::1','',NULL,0,1484190861,NULL,NULL),
	(3,'imamsyafii','8BSmGN0E-f_8kI-XXkq-t-BFiD5sNOnB','$2y$13$bQUForcOafYQd6Nzo8LjG.sCYFmL..teQyI4g71JzoQHr13QngyQG',NULL,1,0,1483524783,1483524783,'::1','',NULL,0,NULL,NULL,NULL),
	(4,'testing','Es2F1Hpw4wDD8EkF0G8ov13NnnfuslKS','$2y$13$bQUForcOafYQd6Nzo8LjG.sCYFmL..teQyI4g71JzoQHr13QngyQG',NULL,1,0,1483525480,1484037485,'::1','','',0,NULL,NULL,NULL);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_pass_history
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_pass_history`;

CREATE TABLE `user_pass_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL DEFAULT '',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_pass_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user_pass_history` WRITE;
/*!40000 ALTER TABLE `user_pass_history` DISABLE KEYS */;

INSERT INTO `user_pass_history` (`id`, `user_id`, `password_hash`, `created_at`, `updated_at`)
VALUES
	(1,1,'',1483606903,NULL),
	(2,1,'Maspii88$',1483606991,NULL),
	(3,1,'$2y$13$zcaQspawV72mNMPxbeuTG.Yb0CkQfOq7Yl1xJzvvTwadff1/Dv9xC',1483607146,NULL),
	(4,1,'$2y$13$3IBRjFygFmgrMlYbT6TgOe0DkQzq03XGw/TqKQhz.rVz70PFDciDG',1483607159,NULL),
	(5,1,'$2y$13$3WWy19BG1iy4t9bsoNj9pezjISw5hy71u1gsIFOpTV9DSRw97WEDy',1483607223,NULL),
	(15,1,'$2y$13$UV3QGda.BjBZnKoxCYpjAOZicewi42bA5tvhpEdn6XBIb.OMGAvsa',1483608850,NULL),
	(16,1,'$2y$13$DsVrhp835Gg9tjkPZ6Yyi.QWBafyWWLnoA.utM5KRVx6ev/OtNpQm',1483608982,NULL),
	(17,1,'$2y$13$bQUForcOafYQd6Nzo8LjG.sCYFmL..teQyI4g71JzoQHr13QngyQG',1483612223,NULL),
	(18,1,'$2y$13$U7qd1wRl1yOgtIGOKlZQk.HMLpYHVdly3bl1HKY.kUhyALP81Fg.e',1483612996,NULL),
	(20,1,'$2y$13$x40F1P6vg/SX1pkyQXh3duiKBWaL7jXBaEDkk29ryYU/Mb.QuJqIm',1484031631,NULL),
	(21,2,'$2y$13$qVWGy43oGWNIXWmw2A.fQOPTc.dgM/oKJMxqOB6Gv91JBmn.e6JS6',1484190864,NULL),
	(22,1,'$2y$13$M5n/MIoAR8DgeoZLHCQ6NeGZHDYZjX006UR7.xRPKCpddxIvlmTba',1484210149,NULL);

/*!40000 ALTER TABLE `user_pass_history` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_visit_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_visit_log`;

CREATE TABLE `user_visit_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `language` char(2) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `visit_time` int(11) NOT NULL,
  `browser` varchar(30) DEFAULT NULL,
  `os` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_visit_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user_visit_log` WRITE;
/*!40000 ALTER TABLE `user_visit_log` DISABLE KEYS */;

INSERT INTO `user_visit_log` (`id`, `token`, `ip`, `language`, `user_agent`, `user_id`, `visit_time`, `browser`, `os`)
VALUES
	(1,'586cbf039c3b2','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1483521795,'Chrome','mac'),
	(2,'586cc2d7291bb','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1483522775,'Chrome','mac'),
	(3,'586cc5bd2587e','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1483523517,'Chrome','mac'),
	(4,'586cc73671f3f','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',2,1483523894,'Chrome','mac'),
	(5,'586ccaaf16c8e','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',3,1483524783,'Chrome','mac'),
	(6,'586ccb60815a1','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',3,1483524960,'Chrome','mac'),
	(7,'586ccd68eff8b','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',4,1483525480,'Chrome','mac'),
	(8,'586cd692013b7','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',3,1483527826,'Chrome','mac'),
	(9,'586cd8cfba5c9','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',3,1483528399,'Chrome','mac'),
	(10,'586dbf69444c0','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',3,1483587433,'Chrome','mac'),
	(11,'586dbfade168e','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1483587501,'Chrome','mac'),
	(12,'586dc333298d0','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1483588403,'Chrome','mac'),
	(13,'586dc858c9fbc','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1483589720,'Chrome','mac'),
	(14,'586dc8853aa0a','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1483589765,'Chrome','mac'),
	(15,'586df7f163b1d','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',3,1483601905,'Chrome','mac'),
	(16,'586df8161c978','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1483601942,'Chrome','mac'),
	(17,'586e0b3a1736f','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1483606842,'Chrome','mac'),
	(18,'586e0f5f2601c','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1483607903,'Chrome','mac'),
	(19,'586e10bd3f63c','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1483608253,'Chrome','mac'),
	(20,'587475a9cf956','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1484027305,'Chrome','mac'),
	(21,'58749e35a76b5','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1484037685,'Chrome','mac'),
	(22,'5875aa6b1c7ef','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1484106347,'Chrome','mac'),
	(23,'5875e89bc169d','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1484122267,'Chrome','mac'),
	(24,'5876f2b9657cd','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1484190393,'Chrome','mac'),
	(25,'5876f3bfa0cef','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1484190655,'Chrome','mac'),
	(26,'5876f4564dfab','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',2,1484190806,'Chrome','mac'),
	(27,'58c4c3c416a1a','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',3,1489290180,'Chrome','mac'),
	(28,'58c4c3fa98ae8','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1489290234,'Chrome','mac'),
	(29,'58c4c4832035b','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',3,1489290371,'Chrome','mac'),
	(30,'58c4c4b72020e','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1489290423,'Chrome','mac'),
	(31,'58c4c52bdf508','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',3,1489290539,'Chrome','mac'),
	(32,'5876fcef6b206','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1484193007,'Chrome','mac'),
	(33,'5876fd30efc0c','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',3,1484193072,'Chrome','mac'),
	(34,'5876fe2130da8','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',3,1484193313,'Chrome','mac'),
	(35,'5876fe6dadd87','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',3,1484193389,'Chrome','mac'),
	(36,'5876feed26e35','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',3,1484193517,'Chrome','mac'),
	(37,'5876ffc46c908','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',3,1484193732,'Chrome','mac'),
	(38,'587700ad28f2d','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',3,1484193965,'Chrome','mac'),
	(39,'58770129c572d','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',3,1484194089,'Chrome','mac'),
	(40,'587701734adeb','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',3,1484194163,'Chrome','mac'),
	(41,'587701ffacd2f','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',3,1484194303,'Chrome','mac'),
	(42,'58c4caba6b10e','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',3,1489291962,'Chrome','mac'),
	(43,'58c4cad388508','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',3,1489291987,'Chrome','mac'),
	(44,'587705d45ca4f','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1484195284,'Chrome','mac'),
	(45,'58772263a5470','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1484202595,'Chrome','mac'),
	(46,'58773f9958cee','::1','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2393.94',1,1484210073,'Chrome','mac');

/*!40000 ALTER TABLE `user_visit_log` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
