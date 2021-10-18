<?php
define("ROOT_DIR", dirname(__FILE__));

define("DB_HOST", "172.18.0.2");
// define("DB_HOST", "mysql");
define("DB_PORT", 3306);

define("MYSQL_ROOT_USER", "root");
define("MYSQL_ROOT_PASSWORD", "toor");

define("DB_USER", "app");
define("DB_PASS", "app-Sive.21");

define("DB_USER_ADMIN", "administrador");
define("DB_PASS_ADMIN", "administrador-Sive.21");

define("DB_USER_VENDEDOR", "vendedor");
define("DB_PASS_VENDEDOR", "vendedor-Sive.21");

define("DB_USER_CLIENTE", "cliente");
define("DB_PASS_CLIENTE", "cliente-Sive.21");

if ($_ENV['ENVIRONMENT'] == 'test') {
  define("DB_NAME", "bd_sive_test");
} else {
  define("DB_NAME", "bd_sive");
}
