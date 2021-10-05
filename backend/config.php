<?php
define("ROOT_DIR", dirname(__FILE__));


if ($_ENV['ENVIRONMENT'] == 'dev') {
  define("DB_PORT", "3306");
  define("DB_NAME", "bd_sive");
}

if ($_ENV['ENVIRONMENT'] == 'test') {
  define("DB_PORT", "3306");
  define("DB_NAME", "bd_sive_test");
}

if ($_ENV['ENVIRONMENT'] == 'prod') {
  define("DB_PORT", "3306");
  define("DB_NAME", "bd_sive");
}

// define("DB_HOST", $_ENV['MYSQL_HOST']);
define("DB_HOST", "database");
define("DB_NAME", "bd_sive");
define("DB_PORT", "3306");

define("DB_USER_ADMIN", "admin");
define("DB_PASS_ADMIN", "admin-Sive.21");

define("DB_USER_VENDEDOR", "vendedor");
define("DB_PASS_VENDEDOR", "vendedor-Sive.21");

define("DB_USER_CLIENTE", "cliente");
define("DB_PASS_CLIENTE", "cliente-Sive.21");

// define("DB_HOST", "172.18.0.3");
define("DB_USER", "app");
define("DB_PASS", "app-Sive.21");
// define("DB_NAME", "bd_sive");
// define("DB_PORT", "3306");
